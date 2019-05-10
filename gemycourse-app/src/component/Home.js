import React, {Component} from 'react'
import {Row, Col} from 'reactstrap';
import Kingkong from './../image/sing.jpg'

export default class Home extends Component {
    
  render() {
    return (
      <div className="card">
        <div className="card-body">
         <Myrow/>
         <Myrow/>
         <Myrow/>
        </div>
      </div>
    )
  }
}


function Myrow() {
  return (
    <Row>
      <Col>
        <Totalcard/>
      </Col>
      <Col>
        <Totalcard/>
      </Col>
      <Col>
        <Totalcard/>
      </Col>
    </Row>
  )
}
class Totalcard extends Component {
  render() {
    return (
      <div>
        <a href="/eiei/">
          <img
            src={Kingkong}
            className="img-fluid rounded mx-auto d-block mb-5 shadow"
            alt="..."/></a>
      </div>
    )
  }
}