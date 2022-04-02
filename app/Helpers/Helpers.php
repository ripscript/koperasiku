<?php 

use Illuminate\Support\Facades\Session;

function getUserData ()
{
    $users = Session::get('admin');
    return $users;
}


?>