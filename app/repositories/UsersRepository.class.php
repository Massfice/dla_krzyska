<?php

namespace app\repositories;

use app\forms\RegisterForm;
use core\App;

class UsersRepository {
    static function getByUsername( string $username ) {
        $medoo = App::getDB();

        $users = $medoo->select( 'User', [
            'iduser',
            'login',
            'password',
            'isactive',
            'lastlogin',
            'name',
            'surname',
            'city',
            'createdby',
            'whochanged'
        ], [
            'login' => $username
        ] );

        return isset( $users[ 0 ] ) ? $users[ 0 ] : null;
    }

    static function addUser( RegisterForm $form ) {
        $medoo = App::getDB();

        $data = [
            'login' => $form->username,
            'password' => password_hash( $form->password, PASSWORD_DEFAULT ),
            'isactive' => 1,
            'lastlogin' => date( 'Y-m-d' ),
            'name' => $form->name,
            'surname' => $form->surname,
            'city' => $form->city,
            'createdby' => null,
            'whochanged' => null
        ];

        $medoo->insert( 'User', $data );

        $data[ 'iduser' ] = intval( $medoo->id() );

        return $data;
    }

    static function getUsers() {
        $medoo = App::getDB();

        $users = $medoo->select( 'User', [
            'iduser',
            'login',
            'password',
            'isactive',
            'lastlogin',
            'name',
            'surname',
            'city',
            'createdby',
            'whochanged'
        ] );

        return $users;
    }
}
