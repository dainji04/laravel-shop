<?php

namespace App\Http\Services\Menu;

use App\Models\Menus;
use Illuminate\Support\Str;

class MenuService
{
    public function create($formRequest)
    {
        try {

            $menu = Menus::create([
                'name' => (string) $formRequest->input('name'),
                'parent_id' => (int) $formRequest->input('parent_id'),
                'description' => (string) $formRequest->input('description'),
                'content' => (string) $formRequest->input('content'),
                'active' => (int) $formRequest->input('active'),
                'slug' => (string) Str::slug($formRequest->input('name'), '-'),
            ]);

            $menu->save();

            session()->flash('success', 'Menu created successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }

        return true;
    }

    public function getParentId()
    {
        return Menus::where('parent_id', 0)->get();
    }
}
