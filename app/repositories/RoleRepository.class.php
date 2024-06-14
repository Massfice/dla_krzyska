<?php

namespace app\repositories;

use core\App;

class RoleRepository {
    static function getRoles( int $userId ) {
        $roles = [ 'user' ];

        $meedo = App::getDB();

        $roleDetails = $meedo->select( 'Roledetail', [
            'idRoledetail',
            'updatedate',
            'User_iduser',
            'Role_idRole'
        ], [
            'User_iduser' => $userId
        ] );

        foreach ( $roleDetails as $roleDetail ) {
            $role = $meedo->select( 'Role', [
                'idRole',
                'Rolename'
            ], [
                'idRole' => $roleDetail[ 'Role_idRole' ]
            ] );

            array_push( $roles, $role[ 0 ][ 'Rolename' ] );
        }

        return $roles;
    }
}