<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute( 'home' );
App::getRouter()->setLoginRoute( 'login_view' );

Utils::addRoute( 'home', 'ConversionCtrl' );

Utils::addRoute( 'register_view', 'UsersCtrl' );
Utils::addRoute( 'register', 'UsersCtrl' );

Utils::addRoute( 'login_view', 'LoginCtrl' );
Utils::addRoute( 'login', 'LoginCtrl' );
Utils::addRoute( 'logout', 'LoginCtrl', [ 'user', 'admin' ] );
