<?php

namespace app\controllers;

class UsersCtrl extends BaseCtrl {
    public function action_register_view() {
        $this->generateView( 'register.tpl', [] );
    }
}