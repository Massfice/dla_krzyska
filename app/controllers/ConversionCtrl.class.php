<?php

namespace app\controllers;

class ConversionCtrl extends BaseCtrl {
    public function action_home() {
        $this->generateView( 'home.tpl', [] );
    }
}