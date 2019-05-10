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
          <Navbar id="navce" light expand="md" >
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