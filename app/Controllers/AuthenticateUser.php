<?php 
namespace App\Controllers;

use App\Controllers\BaseController;

class AuthenticateUser extends BaseController{
    public function register()
    {
        return view("/pages/authenticate/register");
    }

    public function login()
    {
        return view("/pages/authenticate/login");
    }

    public function logout()
    {
        return view("/pages/authenticate/logout");
    }
}

?>