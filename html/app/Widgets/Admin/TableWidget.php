<?php

namespace App\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class TableWidget extends AbstractWidget
{
    private $model;
    private $skip = 0;
    private $per_page = 1;
    private $data = array();
    public $encryptParams = false;

    public function __construct(array $config = [])
    {
        $this->data = $this->pack($config);

        $this->addConfigDefaults([
            'model' => $config['model'],
            'fields' => $config['fields'],
        ]);

        parent::__construct($config);
    }

    public function placeholder()
    {
        return 'Данные загружаются в таблицу...';
    }

    public function run()
    {
        if (!$this->data) return false;

        return view('widgets.admin._table', [
            'data' => $this->data,
            'model' => $this->model,
        ]);
    }

    private function pack(array $config)
    {
        $data = [
            "inputs" => [],
            "values" => []
        ];

        $model = new $config['model'];
        $data['primary_key'] = (isset($model::$primary_key)) ? $model::$primary_key : 'id';
        $this->model = $config['model'];

        foreach ($config['fields'] as $name => $type) {
            $value = "";
            if (isset($config['filter'])) {
                $value = $config['filter'][$name];
            }

            array_push($data["inputs"], [
                'key' => $name,
                'name' => trans(ucfirst(class_basename($model)) . "::" . mb_strtolower(class_basename($model)) . "." . $name),
                'value' => $value,
                'type' => $type
            ]);
        }

        if(isset($config['curr_page'])){
            $this->skip = ($config['curr_page'] - 1) * $this->per_page;
            $data['curr_page'] = $config['curr_page'];
        }else{
            $data['curr_page'] = 1;
        }

        if (isset($config['filter'])) {
            $filtered = $this->filter($model, $config['fields'], $config['filter']);
            $data['values'] = $filtered['data'];
            $data['pages'] = ceil($filtered['pages'] / $this->per_page);

            if($data['curr_page'] > $data['pages']){
                $data['curr_page'] = $data['pages'];
                $this->skip = ($config['curr_page'] - 2) * $this->per_page;

                $filtered2 = $this->filter($model, $config['fields'], $config['filter']);
                $data['values'] = $filtered2['data'];
                $data['pages'] = ceil($filtered2['pages'] / $this->per_page);
            }

        } else {
            $data['values'] = $model::select('*')->skip($this->skip)->take($this->per_page)->get();
            $data['pages'] = ceil($model::all()->count() / $this->per_page);
        }

        $data['curr_page'] = ($data['curr_page'] == 0) ? 1 : $data['curr_page'];

        return $data;
    }

    private function filter($model, $fields = null, $filter = null)
    {
        if ($filter && $filter != "") {
            $matches = [];
            foreach ($filter as $name => $value) {
                if ($value != "" && $value != null) {
                    if ($fields[$name] == "text" || $fields[$name] == "wysiwyg") {
                        $matches[] = [$name, 'like', '%' . $value . '%'];
                    } else {
                        $matches[] = [$name, $value];
                    }
                }
            }

            return [
                'data' => $model::where($matches)->skip($this->skip)->take($this->per_page)->get(),
                'pages' => $model::where($matches)->count()
            ];
        }
    }
}
