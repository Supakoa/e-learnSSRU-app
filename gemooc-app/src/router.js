import React,{Component} from "react";
import {BrowserRouter as Router, Route} from "react-router-dom";
import AppSD from './student/AppSD';
import AppTC from './teacher/AppTC';
import AppAM from './admin/AppAM';
import AppRG from './register/AppRG';

export default class App extends Component {
  render() {
    return (
      <Router>
        <Route exact path="/" component={AppRG}/>
        <Route path="/about" component={AppSD}/>
        <Route path="/topics" component={AppAM}/>
        <Route path="/topics" component={AppTC}/>
      </Router>
    );
  }
}
