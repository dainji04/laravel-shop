<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class adminController extends Controller
{
    public function index(): View
    {
        return view('admin');
    }
}
