@extends('layouts.app')
@section('title', 'edit')
@section('content')
    <form action="/album/{{$albums->id}}" method="post" class="form-control">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <div class="form-group">
                <input class="form-control" type="text" name="albumName" value="{{$albums->albumName}}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">edit</button>
        </div>
    </form>
    <form action="/album/{{$albums->id}}" method="post" class="form-control">
        @method('delete')
        @csrf
        <div class="form-group">
            <button class="btn btn-primary">delete</button>
        </div>
    </form>
@endsection