<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    public function index()
    {
        return view('menus');
    }

    public function store(Request $request)
    {
        dd($request->input());
    }
}
