@extends('signali.iag.layouts.master')

@section('content')

    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>
                    Справка 2
                </h1>
                <h3>{{ Session::get('iaguser')->iaguser->Podelenie  }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">
                                Поделение
                            </th>

                            <th class="text-center" rowspan="2">Сиг-<br>нали</th>
                            <th class="text-center" rowspan="2">Фал-<br>шиви</th>

                            <th class="text-center" colspan="5" >Получени сигнали за:</th>
                            <th class="text-center" colspan="5">Установени нарушения за:</th>
                            <th class="text-center" colspan="5">Съставени актове за:</th>
                        </tr>
                        <tr>
                            <th class="text-center">до-<br>бив</th>
                            <th class="text-center">транс-<br>порти-<br>ране</th>
                            <th class="text-center">съхра-<br>нение</th>
                            <th class="text-center">лов</th>
                            <th class="text-center">пожа-<br>ри</th>

                            <th class="text-center te">до-<br>бив</th>
                            <th class="text-center">транс-<br>порти-<br>ране</th>
                            <th class="text-center">съхра-<br>нение</th>
                            <th class="text-center">лов</th>
                            <th class="text-center">пожа-<br>ри</th>

                            <th class="text-center te">до-<br>бив</th>
                            <th class="text-center">транс-<br>порти-<br>ране</th>
                            <th class="text-center">съхра-<br>нение</th>
                            <th class="text-center">лов</th>
                            <th class="text-center">пожа-<br>ри</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($signali as $signal)
                        <tr>
                            <td>{{ $signal->podelenie->Pod_NameBg }}</td>
                            {{--<td>{{ $signal->podelenie->Pod_NameBg }}</td>--}}
                            <td class="text-center">{{ $signal->signal_count }}</td>
                            <td class="text-center">{{ $signal->falshiv_count }}</td>

                            <td class="text-center">{{ $signal->s_dobiv_count }}</td>
                            <td class="text-center">{{ $signal->s_transport_count }}</td>
                            <td class="text-center">{{ $signal->s_store_count }}</td>
                            <td class="text-center">{{ $signal->s_hunt_count }}</td>
                            <td class="text-center">{{ $signal->s_fire_count }}</td>

                            <td class="text-center">{{ $signal->n_dobiv_count }}</td>
                            <td class="text-center">{{ $signal->n_transport_count }}</td>
                            <td class="text-center">{{ $signal->n_store_count }}</td>
                            <td class="text-center">{{ $signal->n_hunt_count }}</td>
                            <td class="text-center">{{ $signal->n_fire_count }}</td>

                            <td class="text-center">{{ $signal->a_dobiv_count }}</td>
                            <td class="text-center">{{ $signal->a_transport_count }}</td>
                            <td class="text-center">{{ $signal->a_store_count }}</td>
                            <td class="text-center">{{ $signal->a_hunt_count }}</td>
                            <td class="text-center">{{ $signal->a_fire_count }}</td>
                        </tr>
                    @endforeach

                    <thead>
                        @foreach($signali_sum as $signal_sum)
                            <th>Общо:</th>
                            {{--<th></th>--}}
                            <th class="text-center">{{ $signal_sum->signal_count }}</th>
                            <th class="text-center">{{ $signal_sum->falshiv_count }}</th>

                            <th class="text-center">{{ $signal_sum->s_dobiv_count }}</th>
                            <th class="text-center">{{ $signal_sum->s_transport_count }}</th>
                            <th class="text-center">{{ $signal_sum->s_store_count }}</th>
                            <th class="text-center">{{ $signal_sum->s_hunt_count }}</th>
                            <th class="text-center">{{ $signal_sum->s_fire_count }}</th>

                            <th class="text-center">{{ $signal_sum->n_dobiv_count }}</th>
                            <th class="text-center">{{ $signal_sum->n_transport_count }}</th>
                            <th class="text-center">{{ $signal_sum->n_store_count }}</th>
                            <th class="text-center">{{ $signal_sum->n_hunt_count }}</th>
                            <th class="text-center">{{ $signal_sum->n_fire_count }}</th>

                            <th class="text-center">{{ $signal_sum->a_dobiv_count }}</th>
                            <th class="text-center">{{ $signal_sum->a_transport_count }}</th>
                            <th class="text-center">{{ $signal_sum->a_store_count }}</th>
                            <th class="text-center">{{ $signal_sum->a_hunt_count }}</th>
                            <th class="text-center">{{ $signal_sum->a_fire_count }}</th>
                        @endforeach
                    </thead>
                    </tbody>
                </table>

            </div>
        </div>
        @include('signali.iag.includes.footer')
    </div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(function () {
        //////////////////////////////////////////////
        $('#onsignalplace_date').datetimepicker({
//             locale: 'bg',
            format:'YYYY-MM-DD HH:mm',
            useCurrent:true,
            sideBySide:true,
            calendarWeeks:true,
            showTodayButton:true
        });
    });
</script>
@endpush