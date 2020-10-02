<?php

namespace App\Modules\Dashboard\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Modules\Dashboard\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $test = Dashboard::select('*')->where('id', 1)->first();

        //var_dump($test->name);

        return view('Dashboard::admin.index');
    }
}
