<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $menu = '';
        foreach ($menus as $key => $value) {
            if ($value->parent_id == $parent_id) {
                $menu .= '
                    <tr>
                        <td>' . $value->id . '</td>
                        <td>' . $char . $value->name . '</td>
                        <td>' . $value->description . '</td>
                        <td>' . $value->content . '</td>
                        <td>' . $value->active . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="admin/menus/' . $value->id . '/edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="removeRow(' . $value->id . ', \'/admin/menus/destroy\')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                $menu .= self::menu($menus, $value->id, $char . '|--');
            }
        }
        return $menu;
    }
}
