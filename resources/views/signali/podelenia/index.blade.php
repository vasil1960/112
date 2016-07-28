@extends('signali.iag.layouts.master')

@section('content')

    <div class="page-header">
        <h1>Сигнали <small>(по предприятия)</small></h1>
    </div>

    <div class="form-group">
        <div >
            {!! Form::open() !!}
                {!! Form::label('search','Търсене по ... :',['class'=>'control-label']) !!}
                {!! Form::text('search',null, ['class'=>'form-control','autocomplete'=>'off','placeholder'=>'Дата на регистриране на сигнала от служителя']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="panel panel-body">
            {!! $signali->render() !!}

            <div class="table">
                <table class="table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>От:</th>
                            <th>Идент. №:</th>
                            <th>Поделение:</th>
                            <th>РДГ:</th>
                            <th>Дата:</th>
                            <th>Подател:</th>
                            <th>Телефон:</th>
                            <th>Описание:</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($signali as $tey => $signal)
                            <tr>
                                <td class="">{{ $signal->id }}</td>
                                <td class="col-md-1">{{ $signal->signal_from->from }}</td>
                                <td class="">{{ $signal->identnumber }}</td>
                                <td class="col-md-2">{{ $signal->podelenie->Pod_NameBg }} </td>
                                <td class="col-md-2">{{ $signal->RDG->Pod_NameBg }}</td>
                                <td class="col-md-1">{{ \Carbon\Carbon::parse($signal->signaldate)->format('d.m.Y h:m') }}</td>
                                <td class="col-md-2">{{ $signal->name ? $signal->name : '( Анонимен )'}}</td>
                                <td class="col-md-1">{{ $signal->phone ? $signal->phone : '( Анонимен )'  }}</td>
                                <td class="col-md-4">{{ $signal->opisanie }}</td>
                                <td class=""><a href="{{ route('signali.iag.edit',[$signal->id]) }}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                <td class=""><a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody></tbody>
                </table>

            </div>
            {!! $signali->render() !!}
        </div>
    </div>

@endsection


@push('scripts')

    <script type="text/javascript">

        $('#search').on('keyup',function(){

            $value = $(this).val();

            $.ajax({
                type: 'get',
                url : '{{ action('PodeleniaController@search') }}',
                data: { 'search':$value },
                success: function(data){
//                    console.log(data);
                    $('tbody').html(data);
                }
            })
        });
    </script>

@endpush
