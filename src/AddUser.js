import React from 'react';
import './App.css';
import { Redirect } from 'react-router';
//bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
//axios for api request
import axios from 'axios';
class AddUser extends React.Component {
  constructor(props)
    {
      super(props);
      this.addFormData = this.addFormData.bind(this);
    }
  //Form Submission
  addFormData(evt)
    {
      evt.preventDefault();
      const fd = new FormData();
      fd.append('myUsername', this.refs.myUsername.value);
      fd.append('myEmail', this.refs.myEmail.value);
      
      axios.post('http://localhost/save.php', fd
      ).then(res=>
      {
 
    this.myFormRef.reset();
    //Redirect to home page after successfully submission
    this.props.history.push('')
    }
    );
    }
 
  render() {
   
    return (
    
      <div className="maincontainer">
        
        <h1 className="mr-5 ml-5 mt-5">Add User</h1>
        <div className="container mb-5 mt-5 text-left">
        
        <form ref={(el) => this.myFormRef = el}>
        <div className="form-group">
        <input type="email" className="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email" ref="myEmail" />
        
        </div>
        <div className="form-group">
        <input type="text" className="form-control" id="Username" placeholder="Enter Username" ref="myUsername" />
        </div>
        <button type="submit" className="btn btn-primary" onClick={this.addFormData}>Submit</button>
      </form>
       
            
      </div>
     
      </div>
      
)
};
}
export default AddUser;