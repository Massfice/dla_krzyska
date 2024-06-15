<?php

namespace app\controllers;

use app\forms\ConvertForm;
use app\repositories\CurrenciesRepository;

class HomeCtrl extends BaseCtrl {
    private ConvertForm $form;

    public function __construct() {
        $this->form = new ConvertForm();
    }

    public function action_home() {
        $currencies = CurrenciesRepository::getCurrencies();

        $this->generateView( 'home.tpl', [
            'currencies' => $currencies,
            'form' => $this->form,
            'show_actions' => false,
            'converted_price' => null
        ] );
    }

    public function action_convert() {
        $currencies = CurrenciesRepository::getCurrencies();

        $isValidForm = $this->form->loadAndValidateDataFromRequest();

        if ( !$isValidForm ) {
            $this->generateView( 'home.tpl', [
                'currencies' => $currencies,
                'form' => $this->form,
                'show_actions' => false,
                'converted_price' => null
            ] );

            return;
        }

        $price_in_dollars = $this->form->price1 * $this->form->currency1[ 'price_in_dollars' ];
        $price_in_second_currency = 1 / $this->form->currency2[ 'price_in_dollars' ];
        $converted_price = $price_in_dollars * $price_in_second_currency;

        $this->generateView( 'home.tpl', [
            'currencies' => $currencies,
            'form' => $this->form,
            'show_actions' => false,
            'converted_price' => strval( $converted_price ).' '.$this->form->currencycode2
        ] );
    }
}
