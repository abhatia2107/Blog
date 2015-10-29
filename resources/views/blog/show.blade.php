@extends('layouts.master')

@section('content')

    <h1>Blog</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Category</th><th>Radio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $blog->id }}</td> <td> {{ $blog->title }} </td><td> {{ $category[$blog->category_id] }} </td><td> {{ $radio[$blog->radio] }} </td>
                </tr>
            </tbody>
        </table>
        <div>

            <ul>
                @if($blog->b1)
                    <li>{{$checkbox[1]}}</li>
                @endif
                @if($blog->b2)
                    <li>{{$checkbox[2]}}</li>
                @endif
                @if($blog->b3)
                    <li>{{$checkbox[3]}}</li>
                @endif
                @if($blog->b4)
                    <li>{{$checkbox[4]}}</li>
                @endif
                @if($blog->b5)
                    <li>{{$checkbox[5]}}</li>
                @endif
                @if($blog->b6)
                    <li>{{$checkbox[6]}}</li>
                @endif
            </ul>
            {{$blog->details}}
        </div>
    </div>

@endsection