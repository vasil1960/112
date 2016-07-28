@extends('signali.iag.layouts.master')

@section('content')

    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>
                    Начална страница
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Постъпили сигнали в ИАГ чрез телефон</h3>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="img-rounded">
                    <img class="img-rounded center-block" src="../../images/112.jpg">
                </div>
            </div>
        </div>

        @include('signali.iag.includes.footer')
    </div>


@endsection