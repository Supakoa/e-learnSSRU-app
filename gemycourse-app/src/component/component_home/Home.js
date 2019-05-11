import React, {Component} from 'react'
import {
  Row,
  Col,
  CardTitle,
  Card,
  CardText,
  CardImg,
  CardHeader,
  UncontrolledCollapse
} from 'reactstrap';
import Kingkong from './../../image/sing.jpg';
import {Link} from 'react-router-dom';
export default class Home extends Component {
  constructor(props) {
    super(props);
    this.state = {
      course: [
        {
          title: "longsing",
          detail: "3247213694234#$!%!#%!@#%",
          id: 1,
          nameID:"#sub1",
          imgID:"sub1"
        }, {
          title: "MhaiWhailogg",
          detail: "3247213694234#$!%!#%!@#%",
          id: 2,
          nameID:"#sub2",
          imgID:"sub2"
        }, {
          title: "Singley",
          detail: "3247213694234#$!%!#%!@#%",
          id: 3,
          nameID:"#sub3",
          imgID:"sub3"
        }
      ]
    }
  }
  render() {
    console.log("Home")
    console.log(this.props)
    return (
      <Card className="card text-left">
        <CardHeader>
          <h3>Total Course</h3>
        </CardHeader>
        <div className="card-body">
          <Row>
            <Col>
                <MyCollapse  name={this.state.course[0].nameID} img={this.state.course[0].imgID} title={this.state.course[0].title} detail={this.state.course[0].detail}/>
            </Col>
            <Col>
                <MyCollapse  name={this.state.course[1].nameID} img={this.state.course[1].imgID} title={this.state.course[1].title} detail={this.state.course[1].detail}/>
            </Col>
            <Col>
            
                <MyCollapse  name={this.state.course[2].nameID} img={this.state.course[2].imgID} title={this.state.course[2].title} detail={this.state.course[2].detail}/>
            </Col>
            <Col>
            
            </Col>
          </Row>
        </div>
      </Card>
    )
  }
}

class MyCollapse extends Component {
  render() {
    return (
      <div>
        <CardImg id={this.props.img} src={Kingkong} className="shadow mt-3" alt=""/>
        <UncontrolledCollapse toggler={this.props.name}>
          <Card className="text-left">
            <CardTitle >
              {this.props.title}</CardTitle>
            <CardText >{this.props.detail}</CardText>
           <Link className="btn btn-outline-dark" to="/home/course/" >Go To Course</Link>
           {console.log(this.props)}
           
          </Card>
        </UncontrolledCollapse>
      </div>
    )
  }
}



