<div class="data_table">
    <button class="throw_off_filters">Сбросить фильтры</button>
    <div class="_loader_wrapper">
        <div class="_loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        Данные загружаются в таблицу...
    </div>
    {!! Form::open(['url' => '', 'class' => 'data_table_form']) !!}
    {{ Form::hidden('model', $model, ['class' => 'model_name'])  }}
    <div class="table_column">
        @foreach($data["inputs"] as $field)
            <div class="table_row">
                <div class="table_title">
                    {{ trans($field['name'])  }}
                </div>
                <div class="table_input">
                    @switch($field['type'])
                        @case('text')
                        {{ Form::text($field['key'], ($field['value']) ? $field['value'] : null, ['class' => 'form-control', 'data-type' => $field['type']])  }}
                        @break
                        @case('wysiwyg')
                        {{ Form::text($field['key'], ($field['value']) ? $field['value'] : null, ['class' => 'form-control', 'data-type' => $field['type']])  }}
                        @break
                        @case('icon')
                        <div></div>
                        @break
                        @case('status')
                        {{ Form::select($field['key'], [null=>'Не указано'] + [
                            '1' => 'Активный',
                            '0' => 'Неактивный'
                        ], ($field['value'] == 1 || $field['value'] == 0) ? $field['value'] : null,['class' => 'form-control', 'data-type' => $field['type']])  }}
                        @break
                        @default
                        {{ Form::text($field['key'], ($field['value']) ? $field['value'] : null, ['class' => 'form-control', 'data-type' => $field['type']])  }}
                    @endswitch
                </div>
                <div class="table_values">
                    @foreach($data["values"] as $value)
                        <div class="table_value_item">
                            @if($field['type'] == 'status')
                                @if($value->{$field['key']} == 1)
                                    <i class="glyphicon glyphicon-ok" style="color:#5cb85c"></i>
                                @else
                                    <i class="glyphicon glyphicon-remove" style="color:#c9302c"></i>
                                @endif
                            @elseif($field['type'] == 'icon')
                                <i class="{{ $value->{$field['key']}  }}"></i>
                            @else
                                {{ $value->{$field['key']}  }}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="table_row table_controls_row">
            <div class="table_title">Управление</div>
            <div class="table_input"></div>
            <div class="table_values">
                @foreach($data["values"] as $value)
                    <div class="table_value_item">
                        <div class="_controls">
                            <div class="btn-group btn-group-xs">
                                <a href="{{ mb_strtolower(class_basename($model))  }}/update/{{ $value->{$data['primary_key']} }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ mb_strtolower(class_basename($model))  }}/delete/{{ $value->{$data['primary_key']} }}" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::hidden('current_page', $data['curr_page']) !!}

    <ul class="pagination">
        <li class="prev_page page-item @if($data['curr_page'] == 1) disabled @endif">
            <span class="page-link" data-page="{{ $data['curr_page'] - 1 }}">‹</span>
        </li>
        @for($i = 1; $i <= $data['pages']; $i++)
            <li class="page-item @if($i == $data['curr_page']) active @endif">
                <span class="page-link" data-page="{{ $i }}">{{ $i  }}</span>
            </li>
        @endfor
        <li class="prev_page page-item @if($data['curr_page'] == $data['pages']) disabled @endif">
            <span class="page-link" data-page="{{ $data['curr_page'] + 1 }}">›</span>
        </li>
    </ul>
</div>
