<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ИАГ-112</title>

        <link  href="{{ url('css/all.css') }}" rel="stylesheet">
        <!-- Bootstrap CSS -->

        {{--<link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ URL::to('css/bootstrap-theme.min.css') }}" rel="stylesheet">--}}

        {{--<link href="{{ URL::to('css/jquery-ui.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ URL::to('css/select2.min.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ URL::to('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ URL::to('css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
        <link href="{{ url('css/my.css') }}" rel="stylesheet">

        {{--<link  href="{{ URL::to('css/all.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ URL::to('css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">--}}
        {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">--}}
        {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
       {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">--}}
        {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />--}}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{ url('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="{{ url('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
        <![endif]-->

    </head>
    <body>
        @include('signali.iag.includes.navbar')
    <div class="container">

        <div class="row">
            @include('flash::message')
        </div>

        @yield('content')

    </div>

        <script src="{{ url('js/all.js') }}"></script>
        <script src="{{ url('js/my_scripts.js') }}"></script>

        <script>
            $('#flash-overlay-modal').modal();
        </script>
        {{--<!-- jQuery -->--}}
        {{--<script src="//code.jquery.com/jquery.js"></script>--}}
        {{--<script src="{{ URL::to('js/jquery-1.11.1.js') }}"></script>--}}

        {{--<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>--}}

        {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}

        {{--<script src="{{ URL::to('js/datatables.bootstrap.js') }}"></script>--}}
        {{--<!-- DataTables -->--}}
        {{--<script src="{{ URL::to('js/jquery.dataTables.min.js') }}"></script>--}}
        {{--<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>--}}

        {{--<!-- Bootstrap JavaScript -->--}}

        {{--<!-- App scripts -->--}}
        {{--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>--}}

        {{--<script src="{{ URL::to('js/select2.full.min.js') }}"></script>--}}

        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}
        {{--<script src="{{ URL::to('js/moment.js') }}"></script>--}}
        {{--<script src="{{ URL::to('js/bg.js') }}"></script>--}}
        {{--<script src="{{ URL::to('js/bootstrap-datetimepicker.js') }}"></script>--}}
        {{--<script src="{{ URL::to('js/bg.js') }}"></script>--}}

        {{--<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>--}}

        @stack('scripts')
    </body>
</html>