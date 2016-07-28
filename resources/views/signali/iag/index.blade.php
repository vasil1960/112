@extends('signali.iag.layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>Постъпили сигнали от тел. 112</h1>
                {{--<h3>{{ Session::get('iaguser')->Podelenie }}</h3>--}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table list_table table-responsive" id="tblSignali">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Тел.</th>
                        <th>Под.</th>
                        <th>РДГ</th>
                        <th>Дата</th>
                        <th>Подател</th>
                        <th>Телефон</th>
                        <th>Описание</th>
                        {{--<th>РДГ-то</th>--}}
                        <th></th>
                        <th></th>
                        <th></th>
                        {{--<th></th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        @include('signali.iag.includes.footer')
    </div>
@stop

@push('scripts')

<script>
    $(function() {
        $('#tblSignali').DataTable({
            serverSide: true,
            processing: true,
            ajax: "/api/signali?sid={{ request('sid') }}",
            scrollX : "100%",
            scrollY : 550,
//            sStateSave: false,
//            sDeferRender: false,
//            sInfo: true,
//            sOrdering: true,
//            sPaging: true,
            searching: true,
//            sAutoWidth: false,
            pageLength: 50,
            lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Всички записи"]],
            paginationType : "full_numbers",
//            bProcessing: true,
            language: {
                processing: '<img src="{!! url('images/loading_bar.gif') !!}"></p>',
                loadingRecords: "Please wait - loading...",
                emptyTable : "В таблицата няма данни",
                zeroRecords : "Нама записи",
                info: "Показвам от _START_ до _END_ от общо _TOTAL_ записа", // Showing _START_ to _END_ of _TOTAL_ entries
                loadingRecords: "Зареждам данни ...",
                lengthMenu: "В таблицат по _MENU_ рада ",
                search: "Търсене:" ,
                infoFiltered: " (Филтрирано от _MAX_ записа)",
                paginate: {
                    "sFirst": "<<",
                    "sPrevious": "<",
                    "sNext": ">",
                    "sLast": ">>"
                }
            },

//            order: [[ "id", "desc" ]],
//
//            aoColumnDefs: [
//                { "bSortable": false, "aTargets": [ 4, 5, 6 ] }
//            ],
//
//            dom: 'lf<"infotop"i>tip',

            columns: [
                { "width": "", data: 'edit_action', name: 'edit_action', orderable: false, searchable: false},
                { "width": "", data: 'id', name: 'id', searchable: false },
                { "width": "2%", data: 'signalfrom', name: 'signali.signalfrom' },
                { "width": "8%", data: 'pod_id', name: 'signali.pod_id' ,"searchable": true },
                { "width": "10%",data: 'glav_pod', name: 'signali.glav_pod', "searchable": true },
                { "width": "7%", data: 'signaldate', name: 'signali.signaldate', "searchable": true },
                { "width": "10%", data: 'name', name: 'signali.name', "searchable": true },
                { "width": "3%", data: 'phone', name: 'signali.phone', "searchable": true },
                { "width": "60%", data: 'opisanie', name: 'signali.opisanie', "searchable": true },
                { "width": "", data: 'show_action', name: 'show_action', orderable: false, searchable: false},
                { "width": "", data: 'report_action', name: 'report_action', orderablele: false, searchable: false},
                { "width": "", data: 'otchet_action', name: 'otchet_action', orderablele: false, searchable: false},
//                { "width": "4%", data: 'proveren', name: 'proveren', orderablele: false, searchable: false}
            ],
        });
    });
</script>
@endpush
