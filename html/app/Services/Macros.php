<?php
namespace App\Services;

use Collective\Html\FormBuilder;

class Macros extends FormBuilder
{
    /**
     * Generate Bank drop down list
     *
     * @param $name
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */

    public function CKEditor($name, $options = array())
    {
        return view('components.admin.forms.summernote', [
            "name" => $name,
            "options" => json_encode($options, true)
        ]);
    }
}
