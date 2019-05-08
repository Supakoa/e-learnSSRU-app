import React, { Component } from 'react';
import {Router, Route} from 'react-router-dom';

export default class componentName extends Component {
    render() {
        return (
            <Router>
                <Route path='path' component={component}/>
                
            </Router>
        )
    }
}
