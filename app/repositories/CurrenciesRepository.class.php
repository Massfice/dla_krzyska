<?php

namespace app\repositories;

use app\forms\CurrencyForm;
use core\App;

class CurrenciesRepository {
    static function getCurrencies() {
        $medoo = App::getDB();

        $currencies = $medoo->select( 'Currency', [
            'idcurrency',
            'currencyname',
            'currencycode',
            'price_in_dollars'
        ] );

        return $currencies;
    }

    static function getCurrency( $code ) {
        $medoo = App::getDB();

        $currencies = $medoo->select( 'Currency', [
            'idcurrency',
            'currencyname',
            'currencycode',
            'price_in_dollars'
        ], [
            'currencycode' => $code
        ] );

        return isset( $currencies[ 0 ] ) ? $currencies[ 0 ] : null;
    }

    static function addCurrency( CurrencyForm $form ) {
        $medoo = App::getDB();

        $data = [
            'currencyname' => $form->name,
            'currencycode' => $form->code,
            'price_in_dollars' => $form->price
        ];

        $medoo->insert( 'Currency', $data );

        $data[ 'idcurrency' ] = $medoo->id();

        return $data;
    }
}