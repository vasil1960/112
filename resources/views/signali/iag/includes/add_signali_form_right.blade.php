<div class="form-group">
    {!! Form::label('adress','Адрес:',['class'=>'col-dm-3 control-label']) !!}
    <div class="col-dm-9">
        {!! Form::text('adress',null, ['class'=>'form-control','placeholder'=>'Адрес на подателя на сигнала']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pod_id') ? 'has-error' : ''}}">
    {!! Form::label('opisanie','Описание:',['class'=>'col-dm-3 control-label']) !!}
    <div class="col-dm-9">
        {!! Form::textarea('opisanie',null, ['rows'=>'3','class'=>'form-control','placeholder'=>'Описание на сигнала']) !!}
        {!! $errors->first('opisanie', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deistvie') ? 'has-error' : ''}}">
    {!! Form::label('deistvie','Предприети действия:',['class'=>'col-dm-3 control-label']) !!}
    <div class="col-dm-9">
        {!! Form::textarea('deistvie',null, ['rows'=>'2','class'=>'form-control','placeholder'=>'Предприети действия от регистриращия сигнала']) !!}
        {!! $errors->first('deistvie', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deistvie_date') ? 'has-error' : ''}}">
    {!! Form::label('deistvie_date','Дата на действието:',['class'=>'col-dm-3 control-label','autocomplete'=>'off']) !!}
    <div class="col-dm-9">
        {!! Form::text('deistvie_date',null, ['class'=>'form-control','placeholder'=>'Дата на предприетите действия от служителя приел сигнала']) !!}
        {!! $errors->first('deistvie_date', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('notes','Забележка:',['class'=>'col-dm-3 control-label']) !!}
    <div class="col-dm-9">
        {!! Form::textarea('notes',null, ['rows'=>'4','class'=>'form-control','placeholder'=>'Забележка']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('policia','Сигнала е предаден на полицията след 22 часа',['class'=>'col-dm-3 control-label']) !!}
    <div class="col-dm-9">
        {!! Form::checkbox('policia', 1, null, ['id'=>'policia', 'class' => 'checkbox']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-dm-offset-3 col-dm-9">
        {!! Form::submit('Регистриране на сигнала',['class'=>'btn btn-info']) !!}
    </div>
</div>

{!! Form::close() !!}

{{--end form--}}