import React, { Component } from 'react'
import {Link} from 'react-router-dom';

export default class SignIn extends Component {
    render() {
        return (
            <div>
                <Link to="/sign-Up">Go To Register</Link>
                this is pages Log-in
            </div>
        )
    }
}
