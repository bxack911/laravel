<?php

namespace App\Modules\Modules\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Modules extends Model
{
    use HasTranslations;

    protected $table = "modules";
    public $timestamps = false;

    public static $primary_key = 'key';

    public $translatable = ['title'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'array',
    ];
}
