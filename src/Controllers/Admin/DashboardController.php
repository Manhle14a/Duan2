<?php

namespace Admin\Mvcoop\Controllers\Admin;
use Admin\Mvcoop\Commons\Controller;

class DashboardController extends Controller{
    public function index(){
        return $this->renderViewAdmin("dashboard");

}
}