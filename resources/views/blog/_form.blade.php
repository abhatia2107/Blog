
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
        <ul class="list-group">
            @foreach($radio as $key=>$val)
                <li class="list-group-item">{!! Form::radio('radio', $key) !!} {{$val}}</li>
            @endforeach
        </ul>
    </div>
</div>

<div class="form-group">
    {!! Form::label('checkbox', 'Checkbox: ', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        <ul class="list-group">
            @foreach($checkbox as $key=>$val)
                <li class="list-group-item">{!! Form::checkbox('checkbox[]',$key) !!} {{$val}}</li>
            @endforeach
        </ul>
    </div>
</div>

<div class="form-group">
    {!! Form::label('details', 'Details: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
