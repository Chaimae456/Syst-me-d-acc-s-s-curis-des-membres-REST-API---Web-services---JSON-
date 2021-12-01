import React,{Component} from 'react' ;
import { Form , Button , Col } from 'react-bootstrap';
// import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import Header from '../Compenent/Header';
import { Link,Redirect } from 'react-router-dom';



var status;


class AddUser extends Component {





   constructor(props) {
   super(props)
let loggedIn =false;

 this.state = {
   name:'',
   email:'',
   password:'',
   crud_req:'Register',
    loggedIn
  
  }
  this.onChange = this.onChange.bind(this)
  this.SubmitForm = this.SubmitForm.bind(this)
}





  onChange(e){
    this.setState({
     [e.target.name]:e.target.value

    })

  }
  

  SubmitForm(e){
 e.preventDefault()
 const{name,email,password,crud_req}=this.state
 
if(email !==''){

  const url = "http://localhost/services-digital/Modul.php";

const formData = this.state={name,password,email,crud_req};
// axios.post(url ,JSON.stringify(formData))
fetch(url ,{ 
  method:'POST', 
  body: JSON.stringify(formData)
})
.then(res => {
 status = res.status
  return res.text()
})
.then(data => {
  alert(data)
  if(status === 200){
  this.setState({
  loggedIn:true
  })
  }

})
.catch(err => {alert(err)})



}else{
  console.log("error you need to fill all the required")
}


  }



 
render(){
 if (this.state.loggedIn){
    return <Redirect to="/Login"/>
  }
return(
  
  <>
  <Col >

  
  <Header />
  <h2>Auto-layout for flexbox grid columns also means you can set the width</h2>
  <p>Atlassian is a leading provider of collaboration software for teams with products including JIRA, Confluence, HipChat, Bitbucket and Stash.</p>
  </Col>
  <Col>
  <Form className="d-grid gap-2 mt-5" onSubmit={this.SubmitForm}>
 
  <Form.Group className="mb-3" controlId="formBasicEmail">
          <Form.Control type="text" name="name" onChange={this.onChange} value={this.state.name}  placeholder="Enter Name" required />

       </Form.Group>

      <Form.Group className="mb-3" controlId="formBasicEmail">
          <Form.Control type="email" name="email" onChange={this.onChange} value={this.state.email} placeholder="Enter email" required />

       </Form.Group>

       <Form.Group className="mb-3" controlId="formBasicPassword">
          <Form.Control type="password" name="password" onChange={this.onChange} value={this.state.password} placeholder="Password" required />
          </Form.Group>

          <Link to="/Login" >already have an Account ?</Link>
<Button  variant="success" type="submit" >
  Submit
</Button>

       </Form>
       </Col>
      </>

)
}
}
export default AddUser;

