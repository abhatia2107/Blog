@extends('layouts.master')

@section('content')

    <h1>Edit Blog</h1>
    <hr/>

    {!! Form::model($blog, ['method' => 'PUT', 'action' => ['BlogController@update', $blog->id], 'class' => 'form-horizontal']) !!}
        @include('blog._form', ['submitButton'=> 'Update']);
    {!! Form::close() !!}

@endsection

@section('pagejquery')
    @include('blog._validation');
@endsection