<?php

namespace app\controllers;

use app\forms\RegisterForm;
use app\repositories\UsersRepository;
use core\App;

class UsersCtrl extends BaseCtrl {
    private RegisterForm $form;

    public function __construct() {
        $this->form = new RegisterForm();
    }

    public function action_register_view() {
        $this->generateView( 'register.tpl', [ 'form' => $this->form ] );
    }

    public function action_register() {
        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'register.tpl', [ 'form' => $this->form ] );

            return;
        }

        $user = UsersRepository::addUser( $this->form );

        App::getRouter()->redirectTo( 'home' );
    }
}