<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\createFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menus;

class MenusController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('menus', [
            'menus' => $this->menuService->getParentId()
        ]);
    }

    public function store(createFormRequest $formRequest)
    {
        $result = $this->menuService->create($formRequest);

        return redirect()->back();
    }

    public function destroy(Menus $menu)
    {
        $this->menuService->deleteMenuById($menu);

        return redirect()->back()->with('success', 'Đã xoá danh mục thành công');
    }
}
