import React,{Component} from "react";
import {Link } from 'react-router-dom'
import {Redirect} from "react-router-dom"

 class Session extends Component{
    constructor(props) {
        super(props)

const Token = localStorage.getItem('token');
// check autorization 
//     fetch(url ,{ 
//     method:'POST', 
//     body: JSON.stringify(isToken)
//     })
//     .then(res => {
//     status = res.status
//     return res.text()
//     })
//     .then(data => {
//     alert(data)
//     if(status === 200){
//      this.setState({
//     loggedIn:true
//   })
//   }

// })
// .catch(err => {alert(err)})

     let loggedIn =true;
     if(Token == null){
         loggedIn = false;
     }
     this.state={
         loggedIn
     }
     }
     
    render() {
        if (this.state.loggedIn === false){
            return <Redirect to="/Login"/>
          }
        return(
            <div>
                 

                <h1> welcome </h1>
                <Link  to="/logout">logout</Link>

            </div>
        )
    }
}
export default Session;