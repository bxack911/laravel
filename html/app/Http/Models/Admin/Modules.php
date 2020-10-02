<?php

namespace App\Http\Models\Admin;

class Modules
{
    public static function genMenu()
    {
        $items = self::all();

        return $items;
    }
}
