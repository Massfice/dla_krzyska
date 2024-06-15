<?php

namespace app\repositories;

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
}