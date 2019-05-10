import React, { Component } from 'react'
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
    NavLink,
    Container
  } from 'reactstrap';
  import $ from 'jquery';

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
          <NavbarBrand className="logo" href="/">{this.props.Banner}</NavbarBrand>
            <NavbarToggler onClick={this.toggle}/>
            <Collapse isOpen={this.state.isOpen} navbar>
              <Nav className="ml-auto" navbar>
                <NavItem>
                  <NavLink href="/about">{this.props.sublist}</NavLink>
                </NavItem>
                <NavItem>
                  <NavLink href="/topics">Topic</NavLink>
                </NavItem>
              </Nav>
            </Collapse>
          </Container>
          </Navbar>
        </div>
      );
    }
  }