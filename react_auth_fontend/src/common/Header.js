import React, { Component, Fragment } from 'react';
import { Route, Switch } from "react-router-dom";
import Home from '../components/Home';

export class Header extends Component {
    render() {
        return (
            <Fragment>
                <Switch>
                    <Route exact path="/" Component={Home} ></Route>
                </Switch>
            </Fragment>
        )
    }
}

export default Header
