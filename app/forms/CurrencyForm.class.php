<?php

namespace app\forms;

use app\repositories\CurrenciesRepository;
use core\App;
use core\ParamUtils;
use core\Utils;

class CurrencyForm {
    public string $name;
    public string $code;
    public float $price;

    public function __construct() {
        $this->name = '';
        $this->code = '';
        $this->price = 0.0;
    }

    public function loadAndValidateDataFromRequest() {
        $this->name = ParamUtils::getFromRequest( 'name' );
        $this->code = ParamUtils::getFromRequest( 'code' );
        $this->price = floatval( ParamUtils::getFromRequest( 'price' ) );

        if ( empty( $this->name ) ) {
            Utils::addErrorMessage( 'Currency name is required' );
        }

        if ( empty ( $this->code ) ) {
            Utils::addErrorMessage( 'Currency code is required' );
        }

        if ( empty ( $this->price ) ) {
            Utils::addErrorMessage( 'Currency price is required' );
        }

        $currency = CurrenciesRepository::getCurrency( $this->code );

        if ( $currency != null ) {
            Utils::addErrorMessage( 'Currency already exists' );
        }

        return !App::getMessages()->isError();
    }
}