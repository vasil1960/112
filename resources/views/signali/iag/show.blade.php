@extends('signali.iag.layouts.master')

@section('content')

    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>
                    {{ $signal->podelenie->Pod_NameBg }}
                </h1>
                <h3>
                    ({{ $signal->RDG->Pod_NameBg }})
                </h3>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Сигнал №: {{ $signal->id }}</h3>
                <p class="text-center">Регистриран от {{ $signal->fullNameRegistrator() }} на {{ Carbon\Carbon::parse($signal->InsertDate)->format('d.m.Y год. в H:i:s ч.') }}</p>

                <ul class="list-group col-md-8 col-md-offset-2">
                    <li class="list-group-item">
                        <h4><b>Сигналът е получен от:</b> <small>{{ $signal->signal_from->from }}</small></h4>
                        <h4><b>Дата и час на получаване на сигнала:</b> <small> {{ Carbon\Carbon::parse($signal->signaldate)->format('d.m.Y H:i:s') }}</small></h4>
                        <h4><b>Подател:</b> <small> {{ $signal->name ? $signal->name : 'Анонимен' }}</small></h4>
                        <h4><b>Телефон на подателя:</b> <small>{{ $signal->phone ? $signal->phone : 'Анонимен'}}</small></h4>
                        <h4><b>Адрес на подателя:</b> <small>{{ $signal->adress ?  $signal->adress : 'Няма подаден адрес'}}</small></h4>
                        <h4><b>Описание на сигнала:</b></h4>  {{ $signal->opisanie }}
                        <h4><b>Предприети действия от служителя:</b></h4> {{ $signal->deistvie }}
                        <h4><b>Дата на предприетите действия:</b> <small>{{ Carbon\Carbon::parse($signal->deistvie_date)->format('d.m.Y H:i:s') }}</small></h4>
                        <h4><b>Забележка:</b></h4>  {{ $signal->notes ? $signal->notes : 'Без забележка' }}
                        <h4><b>Предоставен на полицията след 22 ч.:</b> <small>{{ $signal->policia ? 'Да' : ' '}}</small></h4>
                    </li>
                </ul>
            </div>
        </div>
        @include('signali.iag.includes.footer')
    </div>
@endsection