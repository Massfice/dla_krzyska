<?php

namespace app\controllers;

use core\App;
use app\forms\LoginForm;

class LoginCtrl extends BaseCtrl {
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function action_login_view() {
        $this->generateView( 'login.tpl', [ 'form' => $this->form ] );
    }

    public function action_login() {
        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'login.tpl', [ 'form' => $this->form ] );

            return;
        }

        $this->logIn( $this->form->user );

        App::getRouter()->redirectTo( 'home' );
    }

    public function action_logout() {
        session_destroy();

        App::getRouter()->redirectTo( 'home' );
    }

}
