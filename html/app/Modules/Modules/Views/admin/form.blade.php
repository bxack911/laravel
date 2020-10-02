@extends('Main::layouts.admin', ['title' => 'Модули'])

@section('content')
    <div class="module_content module_form">
        {{ Form::CKEditor("bank_name", ["tabsize"=>"2", "height"=>400]) }}
    </div>
@endsection
