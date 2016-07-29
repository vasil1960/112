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
                <h5>Регистриран от: {{ $report->signal->registrator->Name }} {{ $report->signal->registrator->Familia }} ( {{ $report->signal->registrator->Podelenie }} ) на {{ Carbon\Carbon::parse($report->signal->InsertDate)->format('d.m.Y год. в H:i:s ч.') }}</h5>

                <ul class="list-group col-md-8 col-md-offset-2">
                    <li class="list-group-item">
                        <h4><b>Сигналът е получен от:</b> <small>{{ $signal->signal_from->from }}</small></h4>
                        <h4><b>Подател:</b> <small>{{ $signal->name ? $signal->name : 'Анонимен' }}</small></h4>
                        <h4><b>Телефон на подателя:</b> <small>{{ $signal->phone ? $signal->phone : 'Анонимен'}}</small></h4>
                        <h4><b>Адрес на подателя:</b> <small>   {{ $signal->adress ?  $signal->adress : 'Няма подаден адрес'}}</small></h4>
                        <h4><b>Описание на сигнала:</b></h4>  {{ $signal->opisanie }}
                        <h4><b>Предприети действия от служителя:</b></h4> {{ $signal->deistvie }}
                        <h4><b>Дата на предприетите действия:</b> <small>{{ Carbon\Carbon::parse($signal->deistvie_date)->format('d.m.Y г. в H:i:s ч.') }} </small></h4>
                        <h4><b>Предоставен на полицията след 22 ч.:</b> <small>   {{ $signal->policia ? 'Да' : ' '}} </small></h4>
                    </li>

                    <li class="list-group-item">
                        <h4><b>Забалежка:</b></h4>
                        {{ $report->note ? $report->signal->note : 'Няма забележка.' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Отчет към сигнал №: {{ $report->signal->id }}</h3>
                <h5>Изготвил: {{ $report->reporter->Name }} {{ $report->reporter->Familia }} ( {{ $report->reporter->Podelenie }} )</h5>

                <ul class="list-group col-md-8 col-md-offset-2">

                    <li class="list-group-item">
                        <h4><b>Описание на предприетите действията и резултат от проверката:</b></h4>{{ $report->result }}
                    </li>

                    <li class="list-group-item">
                        <h4><b>Сигналът е проверен на:</b> <small>{{ Carbon\Carbon::parse($report->onsignalplace_date)->format('d.m.Y год.') }}</small></h4>
                    </li>

                    @if($report->s_dobiv || $report->s_transport || $report->s_store || $report->s_hunt || $report->s_fire)
                        <li class="list-group-item">
                            <h4><b>Сигналът е:</b></h4>
                            <p>{{  $report->s_dobiv == 1 ? ' - за незаконен добив' : ' '  }}</p>
                            <p>{{  $report->s_transport == 1 ? ' - за незаконно транспортиране' : ' '  }}</p>
                            <p>{{  $report->s_store == 1 ? ' - за незаконно съхранение' : ' '  }}</p>
                            <p> {{  $report->s_hunt == 1 ? ' - по законът за лова и опазване на дивеча' : ' '  }}</p>
                            <p> {{  $report->s_fire == 1 ? ' - за пожар' : ' '  }}</p>
                        </li>
                    @endif

                    @if($report->n_dobiv || $report->n_transport || $report->n_store || $report->n_hunt || $report->n_fire)
                        <li class="list-group-item">
                            <h4><b>Констатирани нарушения:</b></h4>
                            <p>{{  $report->n_dobiv == 1 ? ' - за незаконен добив' : ' '  }}</p>
                            <p>{{  $report->n_transport == 1 ? ' - за незаконно транспортиране' : ' '  }}</p>
                            <p>{{  $report->n_store == 1 ? ' - за незаконно съхранение' : ' '  }}</p>
                            <p> {{  $report->n_hunt == 1 ? ' - по законът за лова и опазване на дивеча' : ' '  }}</p>
                            <p> {{  $report->n_fire == 1 ? ' - за пожар' : ' '  }}</p>
                        </li>
                    @else
                        <li class="list-group-item">
                            <h4><b>Констатирани нарушения:</b></h4>
                            <p>Няма</p>
                        </li>
                    @endif


                    @if($report->a_dobiv || $report->a_transport || $report->a_store || $report->a_hunt || $report->a_fire)
                        <li class="list-group-item">
                            <h4><b>Съставени актове:</b></h4>
                            <p>{{  $report->a_dobiv == 1 ? ' - за незаконен добив' : ' '  }}</p>
                            <p>{{  $report->a_transport == 1 ? ' - за незаконно транспортиране' : ' '  }}</p>
                            <p>{{  $report->a_store == 1 ? ' - за незаконно съхранение' : ' '  }}</p>
                            <p> {{  $report->a_hunt == 1 ? ' - по законът за лова и опазване на дивеча' : ' '  }}</p>
                            <p> {{  $report->a_fire == 1 ? ' - за пожар' : ' '  }}</p>
                        </li>
                    @else
                        <li class="list-group-item">
                            <h4><b>Съставени актове:</b></h4>
                            <p>Няма</p>
                        </li>
                    @endif

                    @if($report->proveren || $report->falshiv)
                        <li class="list-group-item">
                            <h4><b>Сигналът е:</b></h4>
                            <p>{{  $report->proveren == 1 ? ' - проверен на място' : ' '  }}</p>
                            <p>{{  $report->falshiv == 1 ? ' - фалшив' : ' '  }}</p>
                        </li>
                    @else
                        <li class="list-group-item">
                            <p>Сигналът не е проверен на място и не е установено дали е фалшив</p>
                        </li>
                    @endif

                    <li class="list-group-item">
                        <h4><b>Забалежка:</b></h4>
                        {{ $report->note ? $report->note : 'Няма забележка' }}
                    </li>

                    @if((Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 1) ||
                    (Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 115))
                        <li class="list-group-item">
                            <p class="text-center"><a class="btn btn-primary" href="/signali/report/{{ $report->id }}/edit?sid={{ Session::get('iaguser')->ID }}">Редактиране на отчета</a></p>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
        @include('signali.iag.includes.footer')
    </div>

@endsection