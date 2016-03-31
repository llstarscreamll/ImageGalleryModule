<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nombre *') !!}
    {!! Form::text('name', null, ['class' => 'form-control', isset($disabled) ? 'disabled' : ''])  !!}
    @if ($errors->has('name'))
        <div class="text-danger">
            {!! $errors->first('name') !!}
        </div>
    @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Descripción *') !!}
    {!! Form::text('description', null, ['class' => 'form-control', isset($disabled) ? 'disabled' : ''])  !!}
    @if ($errors->has('description'))
        <div class="text-danger">
            {!! $errors->first('description') !!}
        </div>
    @endif
</div>