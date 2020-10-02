<?php
namespace App\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;
use App\Http\Models\Admin\Modules;

class LeftMenu extends AbstractWidget
{
    public function run()
    {
        $menu_items = Modules::genMenu();

        return view('widgets.admin._left_menu', [
            'menu_items' => $menu_items,
        ]);
    }
}
