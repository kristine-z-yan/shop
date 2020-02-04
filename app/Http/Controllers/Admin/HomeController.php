<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(){
//        $this->middleware('admin');
//        $this->middleware('web');
    }

    /**
     *
     */
    public function index() {
        return view('admin\index');
    }
}
