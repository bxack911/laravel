<?php

namespace App\Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Dashboard extends Model
{
    use HasTranslations;

    protected $table = "dashboard";
    public $timestamps = false;

    public $translatable = ['name'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'array',
    ];

    public static function setTest()
    {
        $test = new self();
        $test->name = ['en' => 'myName', 'ru' => 'Naam in het Nederlands'];
        $test->save();
    }
}
