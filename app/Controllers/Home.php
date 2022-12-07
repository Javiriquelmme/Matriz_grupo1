<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;
    protected $id_user;
    
    public function index(){
        return view('prueba');
    }

}