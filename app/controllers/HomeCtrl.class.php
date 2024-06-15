<?php

namespace app\controllers;

use app\repositories\CurrenciesRepository;

class HomeCtrl extends BaseCtrl {
    public function action_home() {
        $currencies = CurrenciesRepository::getCurrencies();

        $this->generateView( 'home.tpl', [
            'currencies' => $currencies,
            'show_actions' => false
        ] );
    }
}
