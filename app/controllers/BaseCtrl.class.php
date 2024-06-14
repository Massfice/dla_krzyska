<?php

namespace app\controllers;

use app\repositories\RoleRepository;
use core\App;
use core\RoleUtils;
use core\SessionUtils;

// class for having some common utility

class BaseCtrl {
    protected function generateView( string $file, array $variables ) {
        $smarty = App::getSmarty();
        $user = SessionUtils::loadObject( 'user', true );

        $smarty->assign( 'page_title', 'Cantor App' );
        $smarty->assign( 'page_description', 'Cantor app is awesome' );
        $smarty->assign( 'is_logged_in', $this->isLoggedIn( $user ) );
        $smarty->assign( 'user', $user );
        foreach ( $variables as $key => $value ) {
            $smarty->assign( $key, $value );
        }

        $smarty->display( $file );
    }

    protected function isLoggedIn( $user ): bool {
        if ( !isset( $user ) ) {
            return false;
        }

        return RoleUtils::inRole( 'user' ) || RoleUtils::inRole( 'admin' );
    }

    protected function logIn( $user ) {
        $roles = RoleRepository::getRoles( $user[ 'iduser' ] );

        foreach ( $roles as $role ) {
            RoleUtils::addRole( $role );
        }

        SessionUtils::storeObject( 'user', $user );
    }
}
