@extends('layouts.master')

@section('content')

    <h1>Edit Blog</h1>
    <hr/>

    {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'class' => 'form-horizontal']) !!}
        @include('contact._form', ['submitButton'=> 'Update']);
    {!! Form::close() !!}

@endsection