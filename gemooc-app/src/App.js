import React, { Component } from 'react'
import AppSD from './student/AppSD';
import AppTC from './teacher/AppTC';
import AppAM from './admin/AppAM';
import AppRG from './register/AppRG';

export default class App extends Component {
    render() {
        return (
            <div>
                <AppRG/>
                <AppTC/>
            </div>
        )
    }
}
