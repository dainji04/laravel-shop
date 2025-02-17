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
        return view('menu.menus', [
            'menus' => $this->menuService->getParentId()
        ]);
    }

    public function store(createFormRequest $formRequest)
    {
        $this->menuService->create($formRequest);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);

        if (!$result) {
            return response()->json([
                'error' => true,
                'message' => 'Menu not found'
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Menu deleted successfully'
        ]);
    }

    public function list()
    {
        return view('menu.list', [
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function edit($id)
    {
        $menu = Menus::find($id);

        if (!$menu) {
            return redirect()->route('menus');
        }

        return view('menu.edit', [
            'menus' => $this->menuService->getParentId(),
            'menuEdit' => $menu
        ]);
    }

    public function update(createFormRequest $formRequest, $id)
    {
        $result = $this->menuService->update($formRequest, $id);

        if (!$result) {
            session()->flash('error', 'Menu cannot be parent of itself');

            return redirect()->back();
        }

        return redirect()->route('home');
    }
}
