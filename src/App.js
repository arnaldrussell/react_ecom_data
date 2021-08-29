import React from 'react';
import './App.css';
//Import react routes and its other modules
import {BrowserRouter as Router, Switch, Route, Link} from 'react-router-dom';
//All components
import AddUser from './AddUser';
import Home from './Home';
import Header from './Header';
//bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
//Impoert axios services
import axios from 'axios';
class App extends React.Component {
  
 
  render() {
   
    return (
      <Router>
      <div className="maincontainer">
        <Header></Header>
        
        <Switch>
            
            
            <Route exact path='/adduser' component={AddUser} />
            <Route exact path='/home' component={Home} />
            <Route exact path='' component={Home} />
           
          </Switch>
            
      
      
      </div>
      </Router>
)
};
}
export default App;