<?php

namespace app\forms;

use app\repositories\UsersRepository;
use core\App;
use core\ParamUtils;
use core\Utils;

class RegisterForm {
    public string $name;
    public string $surname;
    public string $city;
    public string $username;
    public string $password;
    public string $repeat_password;

    public function __construct() {
        $this->name = '';
        $this->surname = '';
        $this->city = '';
        $this->username = '';
        $this->password = '';
        $this->repeat_password = '';
    }

    public function loadAndValidateDataFromRequest() {
        $this->name = ParamUtils::getFromRequest( 'name' );
        $this->surname = ParamUtils::getFromRequest( 'surname' );
        $this->city = ParamUtils::getFromRequest( 'city' );
        $this->username = ParamUtils::getFromRequest( 'username' );
        $this->password = ParamUtils::getFromRequest( 'password' );
        $this->repeat_password = ParamUtils::getFromRequest( 'repeat_password' );

        if ( empty( $this->name ) ) {
            Utils::addErrorMessage( 'Name is required' );
        }

        if ( empty( $this->surname ) ) {
            Utils::addErrorMessage( 'Surname is required' );
        }

        if ( empty( $this->city ) ) {
            Utils::addErrorMessage( 'City is required' );
        }

        if ( empty( $this->username ) ) {
            Utils::addErrorMessage( 'Username is required' );
        }

        if ( empty ( $this->password ) ) {
            Utils::addErrorMessage( 'Password is required' );
        }

        if ( empty ( $this->repeat_password ) ) {
            Utils::addErrorMessage( 'You have to repeat password' );
        }

        if ( $this->password != $this->repeat_password ) {
            Utils::addErrorMessage( 'Provided passwords do not match' );
        }

        $user = UsersRepository::getByUsername( $this->username );

        if ( $user != null ) {
            Utils::addErrorMessage( 'User already exists' );
        }

        return !App::getMessages()->isError();
    }
}