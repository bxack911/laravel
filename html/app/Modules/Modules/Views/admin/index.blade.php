@extends('Main::layouts.admin', ['title' => 'Модули'])

@section('content')
    <div class="table_controls">
        <div class="_left">
            <a href="">Создать модуль</a>
        </div>
    </div>
    <div class="module_content module_table">
        {{ AsyncWidget::run('App\Widgets\Admin\TableWidget', $data)  }}
    </div>
@endsection
