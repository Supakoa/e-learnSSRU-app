import React, {Component} from 'react';
import {confirmAlert} from 'react-confirm-alert'; // Import
import WOW from 'wowjs';
import $ from 'jquery';
import Table from './TAble';

//JQUERY
$("button").click(function () {
  $
    .get("", function (data, status) {
      alert("Data: " + data + "\nStatus: " + status);
    });
});

//APP
export default class App extends Component {
  componentDidMount() {
    new WOW
      .WOW({live: false})
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
        <div className='container text-center mt-5'>
          <button onClick={this.submit}>Confirm dialog</button>
        </div>
        {/* WOW */}
        
        <div className="container">
        <div className="row">
          <h2>Ejemplos de WOW.js</h2>
          <h3>1. data-wow-duration (5s):</h3>
          <div className="wow rotateOutDownRight pink col-md-4 offset-md-4" data-wow-duration="5s">
            <div/>
          </div>
          <h3>2. data-wow-delay (5s):</h3>
          <div className="wow flipOutX blue col-md-4 offset-md-4" data-wow-delay="5s">
            <div/>
          </div>
          <h3>3. data-wow-delay (5 iteraciones):</h3>
          <div className="wow fadeInLeftBig green col-md-4 offset-md-4" data-wow-iteration="5">
            <div/>
          </div>
          <h3>4. data-wow-offset (100px):</h3>
          <div className="wow zoomIn orange col-md-4 offset-md-4" data-wow-offset="100">
            <div/>
          </div>
        </div>
          <Table className="shadow"/>
        </div>

      </div>
    )
  }
}
