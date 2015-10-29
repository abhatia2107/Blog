@extends('layouts.master')

@section('content')

    <h1>Blogs <a href="{{ url('/blog/create') }}" class="btn btn-primary pull-right btn-sm">Add New Blog</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Title</th><th>Category Id</th><th>Radio</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($blogs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/blog', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->category_id }}</td><td>{{ $item->radio }}</td>
                    <td>
                        @if(Auth::user()->level==1)
                            @if(isset($item->deleted_at))
                                <a href="{{ url('/blog/'.$item->id.'/enable') }}"><button type="submit" class="btn btn-success btn-xs">Enable</button></a> /
                            @else
                                <a href="{{ url('/blog/'.$item->id.'/disable') }}"><button type="submit" class="btn btn-info btn-xs">Disable</button></a> /
                            @endif
                        @endif

                        @if((Auth::user()->level==1)||(Auth::id()==$item->user_id))
                            <a href="{{ url('/blog/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> /
                            {!! Form::open(['method'=>'delete','action'=>['BlogController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection