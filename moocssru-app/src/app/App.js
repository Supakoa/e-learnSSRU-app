import React, {Component} from 'react';
import {confirmAlert} from 'react-confirm-alert'; // Import
import WOW from 'wowjs';

export default class App extends Component {
  componentDidMount() {
    new WOW
      .WOW({live: false,})
      .init();
  }
  submit = () => {
    confirmAlert({
      title: 'Confirm to submit',
      message: 'Are you sure to do this.',
      buttons: [
        {
          label: 'Yes',
          onClick: () => alert('Click Yes')
        }, {
          label: 'No',
          onClick: () => alert('Click No')
        }
      ]
    });
  };
  render() {
    return (
      <div>
        <div className='container'>
          <button onClick={this.submit}>Confirm dialog</button>
        </div>
        {/* WOW */}
        <div>
          <h2>Ejemplos de WOW.js</h2>
          <h3>1. data-wow-duration (5s):</h3>
          <div className="wow rotateOutDownRight pink" data-wow-duration="5s">
            <div/>
          </div>
          <h3>2. data-wow-delay (5s):</h3>
          <div className="wow flipOutX blue" data-wow-delay="5s">
            <div/>
          </div>
          <h3>3. data-wow-delay (5 iteraciones):</h3>
          <div className="wow fadeInLeftBig green" data-wow-iteration="5">
            <div/>
          </div>
          <h3>4. data-wow-offset (100px):</h3>
          <div className="wow zoomIn orange" data-wow-offset="100">
            <div/>
          </div>
        </div>

      </div>
    )
  }
}
