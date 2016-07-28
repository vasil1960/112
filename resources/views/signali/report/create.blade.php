@extends('signali.iag.layouts.master')

@section('content')

    <div class="row">
        <div class="panel panel-default panel-heading">
            <div class="panel-body">
                <h1>
                    Отчитане на резултатът от проверката
                </h1>
                <div class="form-group {{ $errors->has('signal_id') ? 'has-error' : '' }} ">
                    <h3>
                        ( Сигнал № {{ $signal->id }} )
                        {!! $errors->first('signal_id', '<span class="help-block">:message</span>') !!}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="col-md-8 col-md-offset-2 form-horizontal"
                      method="post"
                      action="/signali/report">

                    {{ csrf_field() }}

                    <input type="hidden"
                           id="signal_id"
                           name="signal_id"
                           value="{{ $signal->id }}"
                    >

                    <input type="hidden"
                           id="otcheten"
                           name="otcheten"
                           value="1"
                    >

                    {{--<input type="hidden"--}}
                           {{--id="userId"--}}
                           {{--name="userId"--}}
                           {{--value="{{ $userId->userId }}"--}}
                    {{-->--}}

                    <div class="form-group {{ $errors->has('result') ? 'has-error' : '' }} ">
                        <label for="result" class="control-label col-md-3" >Описание:</label>
                        <div class="col-md-9">
                            <textarea rows="5"
                                      class="form-control"
                                      name="result"
                                      id="result"
                                      placeholder="Oписание на извършената проверка"></textarea>
                            {!! $errors->first('result', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('onsignalplace_date') ? 'has-error' : '' }}">
                        <label for="onsignalplace_date" class="control-label col-md-3">Дата:</label>
                        <div class="col-md-5">
                            <input type="text"
                                   class="form-control"
                                   name="onsignalplace_date"
                                   id="onsignalplace_date"
                                   placeholder="Дата на извършване на проверката"></input>
                            {!! $errors->first('onsignalplace_date', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <h4>Сигналът е:</h4>
                        </div>
                    </div>

                    <input type="hidden" name="s_dobiv" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="s_dobiv"
                                           name="s_dobiv"
                                           value="1"
                                    >за незаконен добив
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="s_transport" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="s_transport"
                                           name="s_transport"
                                           value="1"
                                    >
                                    за незаконно транспортиране
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="s_store" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="s_store"
                                           name="s_store"
                                           value="1"
                                    >
                                    за незаконно съхранение
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="s_hunt" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="s_hunt"
                                           name="s_hunt"
                                           value="1"
                                    >
                                   по законът за лова и опазване на дивеча
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="s_fire" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="s_fire"
                                           name="s_fire"
                                           value="1">
                                    за пожар
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <h4>Констатирани нарушения:</h4>
                        </div>
                    </div>

                    <input type="hidden" name="n_dobiv" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="n_dobiv"
                                           name="n_dobiv"
                                           value="1">
                                    за незаконен добив
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="n_transport" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="n_transport"
                                           name="n_transport"
                                           value="1">
                                    за незаконен транспорт
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="n_store" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="n_store"
                                           name="n_store"
                                           value="1">
                                    за незаконно съхранение
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="n_hunt" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="n_hunt"
                                           name="n_hunt"
                                           value="1">
                                    за незаконно ловуване
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="n_fire" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="n_fire"
                                           name="n_fire"
                                           value="1">
                                    пожар
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <h4>Съставени актове:</h4>
                        </div>
                    </div>

                    <input type="hidden" name="a_dobiv" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="a_dobiv"
                                           name="a_dobiv"
                                           value="1">
                                    за незаконен добив
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="a_transport" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="a_transport"
                                           name="a_transport"
                                           value="1">
                                    за незаконен транспорт
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="a_store" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="a_store"
                                           name="a_store"
                                           value="1">
                                    Сза незаконно съхранение
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="a_hunt" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="a_hunt"
                                           name="a_hunt"
                                           value="1">
                                    за незаконно ловуване
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="a_fire" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="a_fire"
                                           name="a_fire"
                                           value="1">
                                    за пожар
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="note" class="control-label col-md-3" >
                            Забележка:
                        </label>
                        <div class="col-md-9">
                            <textarea rows="3"
                                      class="form-control"
                                      name="note"
                                      id="note"
                                      placeholder="Забележка" >
                            </textarea>
                        </div>
                    </div>

                    <input type="hidden" name="falshiv" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="falshiv"
                                           name="falshiv"
                                           value="1">
                                    Подаденият сигнал е фалшив
                                </label>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="proveren" value="0">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           id="proveren"
                                           name="proveren"
                                           value="1">
                                    Сигналът е проверен на място
                                </label>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                             <button class="btn btn-primary">Отчет</button>
                        </div>
                    </div>

                </form>
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