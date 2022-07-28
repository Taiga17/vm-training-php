@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/update/{{$blog[0]->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-8">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" value="{{$blog[0]->title}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <label for="photo">Photo</label><br>
                <input type="file" name="photo" id="photo">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <label for="content">Content</label><br>
                <textarea name="content" id="content" style="width:100%; height:200px;">{{$blog[0]->content}}</textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection
