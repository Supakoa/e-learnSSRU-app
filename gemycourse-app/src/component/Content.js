import React, {Component} from 'react';
import Home from './component_home/Home';
import Course from './component_home/course/course'
import SignIn from './component_sign-in/SignIn';
import Register from './component_sign-in/Register';
import {Route, Switch} from 'react-router-dom';

export default class Content extends Component {

  render() {
    return (
      <div className="container cecontent">
        <Switch>
          <Route exact path="/" component={Home}/>
          <Route path="/sign-In" component={SignIn}/>
          <Route path="/sign-Up" component={Register}/>
          <Route path="/home/course/" component={Course}/>
          <Route component={Notfound}/>
        </Switch>
      </div>
    )
  }
}

function Notfound() {
  return (
    <div>
      {alert("Please Check your path")}
      <h1>Not Found Content !! your Path False</h1>

    </div>
  )

}
