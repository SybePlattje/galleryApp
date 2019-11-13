@extends('layouts.app')
@section('title', 'create album')

@section('content')
    <div class="container">
        <form action="{{route('album.store')}}" method="post" class="form-control">
            @csrf
            <div class="form-group">
                <label for="albumName">Album</label>
                <div class="form-group">
                    <input type="text" name="albumName" class="form-control" value="{{old('albumName')}}">
                    @if($errors->has('albumName'))
                        <ul>
                            @foreach($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
@endsection