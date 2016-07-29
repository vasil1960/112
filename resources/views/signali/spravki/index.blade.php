@extends('signali.iag.layouts.master')

@section('content')

    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>
                    Справка 1
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <th>Поделение</th>
                        <th class="text-right">Сиг.</th>
                        <th class="text-right">Фалш.</th>

                        <th class="text-right">Доб.</th>
                        <th class="text-right">Тран.</th>
                        <th class="text-right">Съхр.</th>
                        <th class="text-right">Лов</th>
                        <th class="text-right">Пож</th>

                        <th class="text-right">Доб.</th>
                        <th class="text-right">Тран.</th>
                        <th class="text-right">Съхр.</th>
                        <th class="text-right">Лов</th>
                        <th class="text-right">Пож</th>

                        <th class="text-right">Доб.</th>
                        <th class="text-right">Тран.</th>
                        <th class="text-right">Съхр.</th>
                        <th class="text-right">Лов</th>
                        <th class="text-right">Пож</th>
                    </thead>
                    <tbody>
                        @foreach($signali as $signal)
                            <tr>
                                <td>{{ $signal->RDG->Pod_NameBg }}</td>
                                <td class="text-right">{{ $signal->signal_count }}</td>
                                <td class="text-right">{{ $signal->falshiv_count }}</td>

                                <td class="text-right">{{ $signal->s_dobiv_count }}</td>
                                <td class="text-right">{{ $signal->s_transport_count }}</td>
                                <td class="text-right">{{ $signal->s_store_count }}</td>
                                <td class="text-right">{{ $signal->s_hunt_count }}</td>
                                <td class="text-right">{{ $signal->s_fire_count }}</td>

                                <td class="text-right">{{ $signal->n_dobiv_count }}</td>
                                <td class="text-right">{{ $signal->n_transport_count }}</td>
                                <td class="text-right">{{ $signal->n_store_count }}</td>
                                <td class="text-right">{{ $signal->n_hunt_count }}</td>
                                <td class="text-right">{{ $signal->n_fire_count }}</td>

                                <td class="text-right">{{ $signal->a_dobiv_count }}</td>
                                <td class="text-right">{{ $signal->a_transport_count }}</td>
                                <td class="text-right">{{ $signal->a_store_count }}</td>
                                <td class="text-right">{{ $signal->a_hunt_count }}</td>
                                <td class="text-right">{{ $signal->a_fire_count }}</td>
                            </tr>
                        @endforeach

                        <thead>
                            @foreach($signali_sum as $signal_sum)
                                <th>Общо:</th>
                                <th class="text-right">{{ $signal_sum->signal_count }}</th>
                                <th class="text-right">{{ $signal_sum->falshiv_count }}</th>

                                <th class="text-right">{{ $signal_sum->s_dobiv_count }}</th>
                                <th class="text-right">{{ $signal_sum->s_transport_count }}</th>
                                <th class="text-right">{{ $signal_sum->s_store_count }}</th>
                                <th class="text-right">{{ $signal_sum->s_hunt_count }}</th>
                                <th class="text-right">{{ $signal_sum->s_fire_count }}</th>

                                <th class="text-right">{{ $signal_sum->n_dobiv_count }}</th>
                                <th class="text-right">{{ $signal_sum->n_transport_count }}</th>
                                <th class="text-right">{{ $signal_sum->n_store_count }}</th>
                                <th class="text-right">{{ $signal_sum->n_hunt_count }}</th>
                                <th class="text-right">{{ $signal_sum->n_fire_count }}</th>

                                <th class="text-right">{{ $signal_sum->a_dobiv_count }}</th>
                                <th class="text-right">{{ $signal_sum->a_transport_count }}</th>
                                <th class="text-right">{{ $signal_sum->a_store_count }}</th>
                                <th class="text-right">{{ $signal_sum->a_hunt_count }}</th>
                                <th class="text-right">{{ $signal_sum->a_fire_count }}</th>
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