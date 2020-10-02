<?php

namespace App\Modules\Material\Controllers;

use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        return view('Material::index');
    }
}
