<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class adminController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(): View
    {
        return view('menu.admin', [
            'menus' => $this->menuService->getAll()
        ]);
    }
}
