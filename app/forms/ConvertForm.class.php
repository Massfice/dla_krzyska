<?php

namespace app\forms;

use app\repositories\CurrenciesRepository;
use core\App;
use core\ParamUtils;
use core\Utils;

class ConvertForm {
    public float $price1;
    public string $currencycode1;
    public string $currencycode2;
    public $currency1;
    public $currency2;

    public function __construct() {
        $this->price1 = 0.0;
        $this->currencycode1 = '';
        $this->currencycode2 = '';
        $this->currency1 = null;
        $this->currency2 = null;
    }

    public function loadAndValidateDataFromRequest() {
        $this->price1 = floatval( ParamUtils::getFromRequest( 'price1' ) );
        $this->currencycode1 = ParamUtils::getFromRequest( 'currencycode1' );
        $this->currencycode2 = ParamUtils::getFromRequest( 'currencycode2' );

        if ( empty( $this->price1 ) ) {
            Utils::addErrorMessage( 'Price 1 is required' );
        }

        if ( empty ( $this->currencycode1 ) ) {
            Utils::addErrorMessage( 'Currency code 1 is required' );
        }

        if ( empty ( $this->currencycode2 ) ) {
            Utils::addErrorMessage( 'Currency code 2 is required' );
        }

        if ( App::getMessages()->isError() ) {
            return false;
        }

        $this->currency1 = CurrenciesRepository::getCurrency( $this->currencycode1 );
        $this->currency2 = CurrenciesRepository::getCurrency( $this->currencycode2 );

        if ( $this->currency1 == null ) {
            Utils::addErrorMessage( 'Currency 1 does not exist' );
        }

        if ( $this->currency2 == null ) {
            Utils::addErrorMessage( 'Currency 2 does not exist' );
        }

        return !App::getMessages()->isError();
    }
}