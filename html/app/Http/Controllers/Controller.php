<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function findModel($key, $model)
    {
        if (isset($model::$primary_key)) {
            if ($model::where($model::$primary_key, $key)->first()) {
                return $model::where($model::$primary_key, $key)->first();
            } else {
                abort(404);
            }
        }else{
            if ($model::where('id', $key)->first()) {
                return $model::where('id', $key)->first();
            } else {
                abort(404);
            }
        }
    }

    protected function deleteModel($key, $model)
    {
        if (isset($model::$primary_key)) {
            return $model::where($model::$primary_key, $key)->delete();
        } else {
            return $model::where('id', $key)->delete();
        }
    }
}
