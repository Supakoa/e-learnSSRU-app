import React, {Component} from 'react';
import {BrowserRouter as Router} from "react-router-dom";
import Header from './component/Header';
import Content from './component/Content';


export default class App extends Component {
  constructor(props){
    super(props);
    this.state={
      subOne: "Log-in"
    }
  }

  render() {
    return (
      <Router>
        <div>
          <Header Banner="MyCourse-{GE}" sublist={this.state.subOne}/>
          <Content/>
        </div>
      </Router>
    );
  }

}




