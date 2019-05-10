import React, {Component} from 'react';
import Home from './Home';
import About from './About';
import Topics from './Topics';
import {Route} from 'react-router-dom';

export default class Content extends Component {
  myRef = React.createRef();

  render() {
    return (
      <div className="container cecontent">
        <Route exact path="/" component={Home}/>
        <Route path="/about" component={About}/>
        <Route path="/topics" component={Topics}/>
        
      </div>
    )
  }
}


  