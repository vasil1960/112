{{--call errors on page--}}
{{--@include('signali.iag.includes.call_errors')--}}
<div class="row">
    <div class="panel panel-default panel-heading">
        <div class="panel-body">
            <h1>Редактиране на сигнал - {{ $signal->id }}</h1>
        </div>
    </div>
</div>
{{--start edit_signali_form form--}}
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            {!! Form::model($signal,['method'=>'PATCH','action'=>['IagController@update',$signal->id],'class'=>'form-horizontal col-md-8 col-md-offset-2']) !!}

            <div class="form-group {{ $errors->has('signalfrom') ? 'has-error' : ''}}">
                {!! Form::label('signalfrom','Постъпил от:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('signalfrom',$signalfrom,[$signal->signalfrom],['class'=>'form-control','placeholder'=>'Избери от къде е постъпил сигнала']) !!}
                    {!! $errors->first('signalfrom', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('signaldate') ? 'has-error' : ''}}">
                {!! Form::label('signaldate','Дата на сигнала:',['class'=>'col-md-2 control-label','autocomplete'=>'off']) !!}
                <div class="col-md-10">
                    {!! Form::text('signaldate',$signal->signaldate, ['class'=>'form-control','placeholder'=>'Дата на регистриране на сигнала от служителя']) !!}
                    {!! $errors->first('signaldate', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('identnumber') ? 'has-error' : '' }}">
                {!! Form::label('identnumber','Идент. №:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('identnumber',null, ['class'=>'form-control','placeholder'=>'Идентификационен номер от републиканския тел. 112']) !!}
                    {!! $errors->first('identnumber', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('pod_id') ? 'has-error' : ''}} ">
                {!! Form::label('pod_id','Местоположение:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('pod_id', $podelenie, $signal->pod_id, ['class'=>'form-control']) !!}
                    {!! $errors->first('pod_id', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('name','Подател:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Подател на сигнала']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('phone','Телефон:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('phone',null, ['class'=>'form-control','placeholder'=>'Телефонен номер от който е подаден сигнала']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('adress','Адрес:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('adress',null, ['class'=>'form-control','placeholder'=>'Адрес на подателя на сигнала']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('opisanie') ? 'has-error' : ''}} ">
                {!! Form::label('opisanie','Описание:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('opisanie',null, ['rows'=>'3','class'=>'form-control','placeholder'=>'Описание на сигнала']) !!}
                    {!! $errors->first('opisanie', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('deistvie') ? 'has-error' : ''}} ">
                {!! Form::label('deistvie','Предприети действия:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('deistvie',null, ['rows'=>'2','class'=>'form-control','placeholder'=>'Предприети действия от регистриращия сигнала']) !!}
                    {!! $errors->first('deistvie', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('deistvie_date') ? 'has-error' : ''}} ">
                {!! Form::label('deistvie_date','Дата на действието:',['class'=>'col-md-2 control-label','autocomplete'=>'off']) !!}
                <div class="col-md-10">
                    {!! Form::text('deistvie_date',$signal->deistvie_date, ['class'=>'form-control','placeholder'=>'Дата на предприетите действия от служителя приел сигнала']) !!}
                    {!! $errors->first('deistvie_date', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('notes','Забележка:',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('notes',null, ['rows'=>'4','class'=>'form-control','placeholder'=>'Забележка']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('policia','Сигнала е предаден на полицията след 22 часа',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::checkbox('policia', 1, null, ['id'=>'policia', 'class' => 'checkbox']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Редактиране сигнала',['class'=>'btn btn-info']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    @include('signali.iag.includes.footer')
</div>