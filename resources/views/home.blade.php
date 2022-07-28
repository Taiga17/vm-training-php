@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td><img src="{{ asset($blog->photo) }}" alt="thumbnail" srcset="" style="width:200px"></td>
                    <td>{{$blog->created_at}}</td>
                    <td>{{$blog->updated_at}}</td>
                    <td>
                        <a href="/blog/{{$blog->id}}">view</a>
                        <a href="/edit/{{$blog->id}}">edit</a>
                        <a href="#" onclick="del({{$blog->id}}, '{{$blog->title}}');">delete</a>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-12">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
