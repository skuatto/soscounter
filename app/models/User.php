<?php

namespace app\models;

class User extends \mako\database\midgard\ORM
{
    protected $tableName = 'user';
    //username, email, password

    public function login($username, $pass)
    {
        $user = User::select( [ 'id' ] )
                ->where( 'username', '=' , $username )
                ->where( 'password', '=' , $pass );
        $clone = clone $user;        

    	if ( $user->count() > 0)
    		return $clone->first()->id;
    	else
    		return false;
    }
}