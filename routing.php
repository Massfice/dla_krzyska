<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute( 'home' );
App::getRouter()->setLoginRoute( 'login_view' );

Utils::addRoute( 'home', 'HomeCtrl' );
Utils::addRoute( 'convert', 'HomeCtrl', [ 'user', 'admin' ] );

Utils::addRoute( 'register_view', 'UsersCtrl' );
Utils::addRoute( 'register', 'UsersCtrl' );
Utils::addRoute( 'users_view', 'UsersCtrl', [ 'admin' ] );
Utils::addRoute( 'add_user_view', 'UsersCtrl', [ 'admin' ] );
Utils::addRoute( 'add_user', 'UsersCtrl', [ 'admin' ] );

Utils::addRoute( 'currencies_view', 'CurrenciesCtrl', [ 'admin' ] );
Utils::addRoute( 'add_currency_view', 'CurrenciesCtrl', [ 'admin' ] );
Utils::addRoute( 'add_currency', 'CurrenciesCtrl', [ 'admin' ] );

Utils::addRoute( 'login_view', 'LoginCtrl' );
Utils::addRoute( 'login', 'LoginCtrl' );
Utils::addRoute( 'logout', 'LoginCtrl', [ 'user', 'admin' ] );
