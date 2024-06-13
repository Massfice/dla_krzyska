<?php

namespace app\controllers;

use core\App;

// class for having some common utility

class BaseCtrl {
    protected function generateView( string $file, array $variables ) {
        $smarty = App::getSmarty();

        $smarty->assign( 'page_title', 'Cantor App' );
        $smarty->assign( 'page_description', 'Cantor app is awsome' );
        foreach ( $variables as $key => $value ) {
            $smarty->assign( $key, $value );
        }

        $smarty->display( $file );
    }
}