<?php

namespace app\controllers;

use app\repositories\CurrenciesRepository;

class CurrenciesCtrl extends BaseCtrl {
    public function action_currencies_view() {
        $currencies = CurrenciesRepository::getCurrencies();

        $this->generateView( 'currencies_list.tpl', [
            'currencies' => $currencies,
            'show_actions' => true
        ] );
    }
}