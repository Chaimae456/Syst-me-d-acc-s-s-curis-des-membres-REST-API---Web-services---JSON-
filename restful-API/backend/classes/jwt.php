<?php 

class JWT{

    public function generate(array $payload,
    string $secret, int $validity = 86400):string {
        
        if ($validity > 0){
            // pour avoir le maintenent 
            $now = new Datetime();

            $expiration = $now->getTimestamp() + $validity;
             $payload['iat'] = $now->getTimestamp();
             $payload['exp'] = $expiration;
        }
        $header = ['typ' => "JWT",
        'algo' => "hs256"
        ];
        
        // on EnCode base 64 
        $base64Header = base64_encode(json_encode($header));
        $base64payload = base64_encode(json_encode($payload));
        // remplacer les char sp nn supporter par json web token 
        $base64Header = str_replace(['+','/','='] , ['-','_',''],$base64Header);
        $base64payload = str_replace(['+','/','='] , ['-','_',''],$base64payload);
        
        // la signature 
        $signature = hash_hmac("sha256",
        $base64Header.'.'.$base64payload,
        $secret,
        true);
        // remplacer les char sp nn supporter par json web token 
        $base64Signature = base64_encode($signature);
        $signature = str_replace(['+','/','='] , ['-','_',''],$base64Signature);
        // voila le token 
        
        $jwt = $base64Header.'.'.$base64payload.'.'.$signature;
        
        return $jwt;

    }

    public function check(string $token , string $secret):bool{
         // On recupere le header et le payload
         $header = $this->getHeader($token);
         $payload = $this->getPayload($token);

         // On genere un token de verification 

        $verfToken = $this->generate($header , $payload , $secret , 0);
            return $token === $verfToken;
        }



        
      

    private function getHeader(string $token)
     {
        // demontage token 
        $array = explode('.',$token);
        $header = json_decode(base64_decode($array[0]) , true);
        return $header;

     }


     private function getPayload(string $token)
     {
        $array = explode('.',$token);
        $payload = json_decode(base64_decode($array[1]) ,true );
        return $payload;
     }

     public function isExpired(string $token): bool {
         $payload = $this->getPayload($token);

         $now = new DateTime();

         return $payload['exp'] < $now->getTimestamp();
     }

     public function isValid(string $token): bool
     {
         return preg_match('/^[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+$/',$token) === 1;
     }


}