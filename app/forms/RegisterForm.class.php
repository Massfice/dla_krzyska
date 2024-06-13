<?php

namespace app\forms;

use core\App;
use core\ParamUtils;
use core\Utils;

class RegisterForm {
    public string $username;
    public string $password;
    public string $repeat_password;

    public function __construct() {
        $this->username = '';
        $this->password = '';
        $this->repeat_password = '';
    }

    public function loadAndValidateDataFromRequest() {
        $this->username = ParamUtils::getFromRequest( 'username' );
        $this->password = ParamUtils::getFromRequest( 'password' );
        $this->repeat_password = ParamUtils::getFromRequest( 'repeat_password' );

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

        return !App::getMessages()->isError();
    }
}