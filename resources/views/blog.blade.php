@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$blog[0]->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-end">
            <span>{{$blog[0]->created_at}}</span>
        </div>
    </div>
    @if(isset($blog[0]->photo))
        <div class="row justify-content-center">
            <div class="col-8">
                <img src="{{ asset($blog[0]->photo) }}" alt="thumbnail" srcset="" style="width:100%">
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <p>{{$blog[0]->content}}</p>
        </div>
    </div>
</div>
@endsection
