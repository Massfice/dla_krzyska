<?php

namespace app\controllers;

use app\forms\RegisterForm;

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
    }
}