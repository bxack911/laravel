<?php

namespace App\Modules\Modules\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Modules\Models\Modules;

class ModulesController extends Controller
{
    private function fields()
    {
        return [
            'model' => Modules::class,
            'fields' => [
                'key' => 'text',
                'name' => 'text',
                'titlee' => 'wysiwyg',
                'icon' => 'icon',
                'pos' => 'text',
                'installed' => 'status',
                'status' => 'status'
            ]
        ];
    }

    public function index()
    {
        return view('Modules::admin.index', [
            'data' => $this->fields(),
        ]);
    }

    public function create()
    {
        return view('Modules::admin.form');
    }

    public function update($key, \Request $request)
    {
        return view('Modules::admin.form', [
            'model' => $this->findModel($key, new Modules),
        ]);
    }

    public function delete($key)
    {
        $this->deleteModel($key, new Modules);
    }
}
