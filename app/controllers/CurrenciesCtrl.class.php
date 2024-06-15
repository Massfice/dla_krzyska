<?php

namespace app\controllers;

use app\forms\CurrencyForm;
use app\repositories\CurrenciesRepository;
use core\App;

class CurrenciesCtrl extends BaseCtrl {
    private CurrencyForm $form;

    public function __construct() {
        $this->form = new CurrencyForm();
    }

    public function action_add_currency() {
        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'add_currency.tpl', [ 'form' => $this->form ] );

            return;
        }

        CurrenciesRepository::addCurrency( $this->form );

        App::getRouter()->redirectTo( 'currencies_view' );
    }

    public function action_add_currency_view() {
        $this->generateView( 'add_currency.tpl', [ 'form' => $this->form ] );
    }

    public function action_currencies_view() {
        $currencies = CurrenciesRepository::getCurrencies();

        $this->generateView( 'currencies_list.tpl', [
            'currencies' => $currencies,
            'show_actions' => true
        ] );
    }
}