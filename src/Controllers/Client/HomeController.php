<?php

namespace Admin\Mvcoop\Controllers\Client;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $name = "Nguyen Van A";
        $email = 'a@gmail.com';
        $password = '1234567';

        $user = new User();
        $user->deleteByID(4);
        // $user->insert($name, $email, $password);
        return $this->renderViewClient('home');
    }
}

