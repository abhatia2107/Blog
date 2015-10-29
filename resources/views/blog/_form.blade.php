
<div class="form-group">
    {!! Form::label('title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('category_id', 'Category Id: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('radio', 'Radio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('radio', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('monday', 'Monday: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::radio('monday', '1', ['class' => 'form-control']) !!}Yes
    {!! Form::radio('monday', '0', true, ['class' => 'form-control']) !!}No
    </div>
    </div><div class="form-group">
    {!! Form::label('tuesday', 'Tuesday: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::radio('tuesday', '1', ['class' => 'form-control']) !!}Yes
    {!! Form::radio('tuesday', '0', true, ['class' => 'form-control']) !!}No
    </div>
    </div><div class="form-group">
    {!! Form::label('wednesday', 'Wednesday: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::radio('wednesday', '1', ['class' => 'form-control']) !!}Yes
    {!! Form::radio('wednesday', '0', true, ['class' => 'form-control']) !!}No
    </div>
    </div><div class="form-group">
    {!! Form::label('thursday', 'Thursday: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::radio('thursday', '1', ['class' => 'form-control']) !!}Yes
    {!! Form::radio('thursday', '0', true, ['class' => 'form-control']) !!}No
    </div>
    </div><div class="form-group">
    {!! Form::label('friday', 'Friday: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::radio('friday', '1', ['class' => 'form-control']) !!}Yes
    {!! Form::radio('friday', '0', true, ['class' => 'form-control']) !!}No
    </div>
    </div><div class="form-group">
    {!! Form::label('details', 'Details: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
    {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    </div>
