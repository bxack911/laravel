@extends('Main::layouts.admin', ['title' => 'Панель управления'])

@section('content')
    <div id="dashboard">
        <div class="content-wrapper">
            <div class="metrics clearfix">
                <div class="metric">
                    <span class="field">ДАТА И ВРЕМЯ</span>
                    <span class="data">2020-07-26 11:37:07</span>
                </div>
                <div class="metric">
                    <a href="/admin/guestbook">
                        <span class="field">НОВЫЙ ОТЗЫВ</span>
                        <span class="data">0</span>
                    </a>
                </div>
                <div class="metric">
                    <a href="/admin/booking">
                        <span class="field">НОВАЯ ЗАЯВКА</span>
                        <span class="data">0</span>
                    </a>
                </div>
                <div class="metric">
                    <a href="/admin/catalog/item">
                        <span class="field">ОБЪЕКТЫ</span>
                        <span class="data">0</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row module-list">
            <a href="/admin/material">
                <div class="module">
                    <div class="info">
                        <div class="name">Материалы</div>

                    </div>
                    <div class="members">
                        <i class="ion-ios-document"></i></div>
                </div>
            </a>
            <a href="/admin/section">
                <div class="module">
                    <div class="info">
                        <div class="name">Разделы</div>

                    </div>
                    <div class="members">
                        <i class="ion-ios-folder"></i></div>
                </div>
            </a>
            <a href="/admin/price">
                <div class="module">
                    <div class="info">
                        <div class="name">Цены</div>

                    </div>
                    <div class="members">
                        <i class="ion-ios-cash"></i></div>
                </div>
                <div class="clearfix"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
