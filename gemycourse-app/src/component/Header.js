import React, { Component } from 'react'
import {
    Collapse,
    Navbar,
    NavbarToggler,
    Nav,
    NavItem,
    Container
  } from 'reactstrap';
  import $ from 'jquery';
  import {Link} from 'react-router-dom';

  $(function () {
    $(window).scroll(function () {
  
      var scrollTop = $(this).scrollTop();
      
      if (scrollTop !== 0) {
      console.log(scrollTop);
  
        $(".ce").stop().animate({
          'opacity': '0.8'
        }, 400);
          $("#navce").css("padding", "7px 5px");
          $("#logo").css("fontsize", "12px ");
        
      } else{
        $(".ce").stop().animate({
          'opacity': '1'
        }, 400);
        $("#navce").css("padding", "20px 5px");
        $("#logo").css("fontsize", "15px ");
      }
        
    });
  
    $(".ce").hover(
      function (e) {
        var scrollTop = $(window).scrollTop();
        if (scrollTop !== 0) {
          $(".ce").stop().animate({
            'opacity': '1'
          }, 400);
        }
      },
      function (e) {
        var scrollTop = $(window).scrollTop();
        if (scrollTop !== 0) {
          $(".ce").stop().animate({
            'opacity': '0.8'
          }, 400);
        }
      }
    );
  });

export default class Header extends Component {
    constructor(props) {
      super(props);
  
      this.toggle = this
        .toggle
        .bind(this);
      this.state = {
        isOpen: false
      };
    }
    toggle() {
      this.setState({
        isOpen: !this.state.isOpen
      });
    }
    render(){
      return (
        <div>
          <Navbar id="navce" className="ce" light expand="md" >
          <Container>
          <Link className="logo navbar-brand" activeClassName="active" to="/">{this.props.Banner}</Link>
            <NavbarToggler onClick={this.toggle}/>
            <Collapse isOpen={this.state.isOpen} navbar>
              <Nav className="ml-auto" navbar>
                <NavItem>
                  <Link className="nav-link" to="/sign-In">{this.props.sublist}</Link>
                </NavItem>
              </Nav>
            </Collapse>
          </Container>
          </Navbar>
        </div>
      );
    }
  }