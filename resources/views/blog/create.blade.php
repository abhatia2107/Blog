@extends('layouts.master')

@section('content')

    <h1>Create New Blog</h1>
    <hr/>

    {!! Form::open(['url' => 'blog', 'class' => 'form-horizontal']) !!}
        @include('blog._form', ['submitButton'=> 'Submit']);
    {!! Form::close() !!}

@endsection