<?php

namespace app\forms;

use app\repositories\UsersRepository;
use core\App;
use core\ParamUtils;
use core\Utils;

class LoginForm {
    public $username;
    public $password;
    public $user;

    public function loadAndValidateDataFromRequest() {
        $this->username = ParamUtils::getFromRequest( 'username' );
        $this->password = ParamUtils::getFromRequest( 'password' );

        if ( empty( $this->username ) ) {
            Utils::addErrorMessage( 'Username is required' );
        }

        if ( empty ( $this->password ) ) {
            Utils::addErrorMessage( 'Password is required' );
        }

        $this->user = UsersRepository::getByUsername( $this->username );

        if ( $this->user == null ) {
            Utils::addErrorMessage( 'Invalid credentials' );
        }

        $isValidPassword = password_verify( $this->password, $this->user[ 'password' ] );

        if ( !$isValidPassword ) {
            Utils::addErrorMessage( 'Invalid credentials' );
        }

        return !App::getMessages()->isError();
    }
}
