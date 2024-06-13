<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl extends BaseCtrl {

    private $form;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest( 'login' );
        $this->form->password = ParamUtils::getFromRequest( 'password' );

        //nie ma sensu walidować dalej, gdy brak parametrów
        if ( !isset( $this->form->login ) )
        return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( empty( $this->form->login ) ) {
            Utils::addErrorMessage( 'Nie podano loginu' );
        }
        if ( empty( $this->form->password ) ) {
            Utils::addErrorMessage( 'Nie podano hasła' );
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if ( App::getMessages()->isError() )
        return false;

        // sprawdzenie, czy dane logowania poprawne
        // ( takie informacje najczęściej przechowuje się w bazie danych )

        App::getDB()->select( 'user', '*', [
            'AND' => [
                'login' => $this->form->login,
                'password' => $this->form->password
            ]
        ] );

        if ( $this->form->login == 'login' && $this->form->password == 'password' ) {
            RoleUtils::addRole( 'user' );
        } else {
            Utils::addErrorMessage( 'Niepoprawny login lub hasło' );
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView( 'main.tpl', [] );
    }

    public function action_login() {
        if ( $this->validate() ) {
            //zalogowany => przekieruj na główną akcję ( z przekazaniem messages przez sesję )
            Utils::addErrorMessage( 'Poprawnie zalogowano do systemu' );
            //App::getRouter()->redirectTo( 'personList' );
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView( 'home.tpl', [] );
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo( 'personList' );
    }

}
