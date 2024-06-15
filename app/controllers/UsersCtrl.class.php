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
        $this->generateView( 'register.tpl', $this->getRegisterVariables() );
    }

    public function action_register() {
        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'register.tpl', $this->getRegisterVariables() );

            return;
        }

        $user = UsersRepository::addUser( $this->form );

        $this->logIn( $user );

        App::getRouter()->redirectTo( 'home' );
    }

    public function action_add_user() {
        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'register.tpl', $this->getAddUserVariables() );

            return;
        }

        UsersRepository::addUser( $this->form );

        App::getRouter()->redirectTo( 'users_view' );
    }

    public function action_add_user_view() {
        $this->generateView( 'register.tpl', $this->getAddUserVariables() );
    }

    public function action_users_view() {
        $users = UsersRepository::getUsers();

        $this->generateView( 'users_list.tpl', [ 'users'=> $users ] );
    }

    private function getRegisterVariables() {
        return [
            'form' => $this->form,
            'button_title' => 'Register',
            'action' => 'register'
        ];
    }

    private function getAddUserVariables() {
        return [
            'form' => $this->form,
            'button_title' => 'Add User',
            'action' => 'add_user'
        ];
    }
}
