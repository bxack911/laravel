<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="sidebar-clear" class="main-sidebar">
        <div class="logo">
            <img src="/uploads/admin/logosprava.png" alt=""> <span style='color:#fff'>3.20.01</span>
        </div>


        <div class="menu-section">
            <ul id="w0" class="nav">
                <li><a href="{{ LaravelLocalization::localizeUrl('/admin') }}"><i
                            class="ion-ios-build"></i><span>{{ __('admin.Панель управления') }}</span></a></li>
                <li><a href="{{ LaravelLocalization::localizeUrl('/admin/material') }}"><i class="ion-ios-document"></i><span>Материалы</span></a>
                </li>
                <li><a href="/admin/section"><i class="ion-ios-folder"></i><span>Разделы</span></a></li>
                <li><a href="/admin/units"><i class="ion-ios-grid"></i><span>ИнфоБлоки</span></a></li>
                <li><a href="/admin/language"><i class="ion-md-globe"></i><span>Языки</span></a></li>
                <li><a href="/admin/gallery"><i class="ion-ios-images"></i><span>Галерея</span></a></li>
                <li><a href="/admin/menu"><i class="ion-md-menu"></i><span>Меню</span></a></li>
                <li><a href="/admin/config"><i class="ion-ios-options"></i><span>Конфигурация</span></a></li>
                <li><a href="/admin/user"><i class="ion-ios-person"></i><span>Пользователи</span></a></li>
                <li><a href="{{ LaravelLocalization::localizeUrl('/admin/modules') }}"><i
                            class="ion-ios-apps"></i><span>{{ __('admin.Модули') }}</span></a></li>
                <li><a href="/admin/file-manager"><i class="ion-ios-folder-open"></i><span>Фаил манеджер</span></a></li>
            </ul>
        </div>

        <div class="menu-section">
            <h3>@lang('admin.Модули')</h3>
            <ul id="w1" class="nav">
                <li><a href="/admin/block"><i class="ion-ios-keypad"></i> <span>Блоки</span></a></li>
                <li><a href="/admin/catalog" data-toggle="sidebar"><i class="ion-ios-clipboard"></i>
                        <span>Каталог</span> <i class="ion-md-arrow-dropdown"></i></a>
                    <ul class="submenu">
                        <li><a href="/admin/catalog/category">Категории</a></li>
                        <li><a href="/admin/catalog/item">Объекты</a></li>
                        <li><a href="/admin/catalog/amenities">Характеристики проекта</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="bottom-menu hidden-sm">
            <ul>
                <li><a href="/admin/doc/help" data-toggle="modal" data-target="#cart"><i class="ion-ios-help-buoy"></i></a>
                </li>
                <li><a href="/admin/sprava-theme/images/sprava1com_manual.pdf" target="blank"><i
                            class="ion-ios-help-circle"></i></a></li>
                <li><a href="{{ route('logout')  }}" title="Logout"><i class="ion-ios-log-out"></i></a></li>

            </ul>
        </div>
    </div>


    <div id="content">
        <div class="menubar">

            <div class="row">
                <div class="col-md-8">
                    <div class="sidebar-toggler visible-xs">
                        <i class="ion-ios-build"></i>
                    </div>

                    <div class="page-title">{{ $title  }}</div>
                    <div class="toggle-menu">
                    </div>
                </div>
                <div class="col-md-4">


                </div>
            </div>
        </div>

        <div id="notifications">


        </div>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

</div>


<div id="cart" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Задать вопрос
            </div>
            <div class="modal-body">

                <form id="w3" action="/admin/question" method="post">
                    <input type="hidden" name="_csrf"
                           value="_wrgqe4RwrDH_TFxm85b7pe-zAyW_SCR6U06uKWTnH2cRLjHq2em9pG-RiDsiRKox9emXv-UQqCOP1TP4dXoJw==">
                    <div class="col">
                        <div class="field mandatory">
                            <div class="form-group field-contact-name required">

                                <input type="text" id="contact-name" class="form-control" name="QuestionForm[name]"
                                       placeholder="ФИО" aria-required="true">

                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="field mandatory">
                            <div class="form-group field-contact-email required">

                                <input type="text" id="contact-email" class="form-control" name="QuestionForm[email]"
                                       placeholder="Email" aria-required="true">

                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="field">
                            <div class="form-group field-contact-message required">

                                <textarea id="contact-message" class="form-control" name="QuestionForm[body]"
                                          placeholder="Сообщение" aria-required="true"></textarea>

                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div style="display: block;width: 100%;clear: both;">
                        <button type="submit" class="btn btn-success">Отправить</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script src="/js/app.js"></script>

@stack('custom-scripts')
</body>
</html>
