<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;

// class for having some common utility

class BaseCtrl {
    protected function generateView( string $file, array $variables ) {
        $smarty = App::getSmarty();

        $smarty->assign( 'page_title', 'Cantor App' );
        $smarty->assign( 'page_description', 'Cantor app is awesome' );
        $smarty->assign( 'is_logged_in', $this->isLoggedIn() );
        foreach ( $variables as $key => $value ) {
            $smarty->assign( $key, $value );
        }

        $smarty->display( $file );
    }

    protected function isLoggedIn(): bool {
        return RoleUtils::inRole( 'user' ) || RoleUtils::inRole( 'admin' );
    }
}