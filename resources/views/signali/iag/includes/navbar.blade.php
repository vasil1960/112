<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://sa.iag.bg">
                <img alt="Brand" src="{!! URL::to('images/logo.png') !!}">
            </a>
            <ul class="nav navbar-nav">
                <li><a href="/signali/iag/home?sid={{ request('sid') }}" >
                    {{--<a href="/signali/iag/home?session={{ request('session') }}" >--}}
                        <h4>
                            Начална
                        </h4>
                    </a>
                </li>

                <li>
                    <a href="/signali/iag?sid={{ request('sid') }}" >
                        <h4>
                            Сигнали
                        </h4>
                    </a>
                </li>

                {{--iag and editor or rdg sofia and editor--}}
                @if((Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 1) ||
                            (Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 115))
                    <li>
                        <a href="/signali/iag/create?sid={{ request('sid') }}">
                            <h4>
                                Нов сигнал
                            </h4>
                        </a>
                    </li>
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <h4>
                            Справки <span class="caret"></span>
                        </h4>

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/signali/spravki/?sid={{ request('sid') }}" >
                                РДГ-та
                            </a>
                        </li>

                        <li>
                            <a href="/signali/spravki/dp?sid={{ request('sid') }}">
                                ДП-та
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Справка 3
                            </a>
                        </li>
                        <li role="separator" class="divider">

                        </li>
                        <li>
                            <a href="#">
                                Separated link
                            </a>
                        </li>
                        <li role="separator" class="divider">

                        </li>
                        <li>
                            <a href="#">
                                One more separated link
                            </a>
                        </li>
                    </ul>
                </li>

                {{--<li>--}}
                    {{--<a href="/signali/iag/create?session={{ request('session') }}">--}}
                        {{--<h4>--}}
                            {{--Регистрация--}}
                        {{--</h4>--}}
                    {{--</a>--}}
                {{--</li>--}}

            </ul>

        </div>
        <div class="navbar-header navbar-right">
           <h4>
               <small>
                   Потребител: ( {{ Session::get('iaguser')->iaguser->Name .' '. Session::get('iaguser')->iaguser->Familia .' '. Session::get('iaguser')->iaguser->Podelenie . ' (' .  Session::get('iaguser')->iaguser->Email .')' }} )
               </small>
           </h4>
        </div>
    </div>
</nav>