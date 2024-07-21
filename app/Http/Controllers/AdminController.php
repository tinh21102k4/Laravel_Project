<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.Analytics');
    }
    public function crm(){
        return view('admin.dashboard.Crm');
    }
}
