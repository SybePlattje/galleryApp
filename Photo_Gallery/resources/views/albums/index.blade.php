@extends('layouts.app')
@section('title', 'Album')

@section('content')
    <div class="container">
        <a href="{{route('album.create')}}">
            <button class="btn btn-primary">create album</button>
            <br>
        </a>
        @foreach($albums as $album)
            <a href="{{route('album.edit', [$album->id])}}">
                <button class="btn btn-primary">edit {{$album->albumName}}</button>
            </a>
            <br>
        @endforeach
        <a href="{{route('home')}}">
            <button class="btn btn-primary">terug</button>
        </a>
    </div>
@endsection