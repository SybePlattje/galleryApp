@extends('layouts.app')
@section('title', 'Show Photos')
@section('content')
    <div class="container">
        @foreach($photoa as $photo)
            {{ $photo->name }}
            <img src="{{asset('public/images/'.$photo->photo.'/'.$photo->photo)}}" alt="{{ $photo->name }}">
            <form action="/photo/{{ $photo->id }}" method="post">
                @csrf
                @method("delete")
                <button type="submit" name="delete" class="btn btn-primary">delete</button>
            </form>
            <a href="{{ route('photo.edit', [$photo->id]) }}">
                <button type="submit" name="update" class="btn btn-primary">update</button>
            </a>
        @endforeach
    </div>
@endsection