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

            // $menu->save(); // Not necessary

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

    public function getAll()
    {
        return Menus::all();
    }

    public function destroy($request)
    {
        try {
            Menus::where('id', $request->id)->delete();

            $listMenu = Menus::where('parent_id', $request->id)->get();

            foreach ($listMenu as $menu) {
                $this->destroy($menu->id);

                Menus::where('id', $menu->id)->delete();
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request, $id)
    {
        try {
            $menu = Menus::find($id);

            if ($request->input('parent_id') == $menu->$id) {
                return false;
            }

            $menu->name = $request->input('name');
            $menu->parent_id = $request->input('parent_id');
            $menu->description = $request->input('description');
            $menu->content = $request->input('content');
            $menu->active = $request->input('active');

            $menu->save();

            session()->flash('success', 'Menu updated successfully');

            return true;
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }
    }
}
