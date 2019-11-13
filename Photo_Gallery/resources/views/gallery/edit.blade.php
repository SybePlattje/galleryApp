@extends('layouts.app')
@section('title', 'Edit Photos')
@section('content')
<div class="container">
    <form action="/photo/{{ $photos->id }}" method="post" class="form-control" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">photo name</label>
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $photos->name }}">
                @if($errors->has('name'))
                    <ul>
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="image">photo</label>
            <div class="form-group">
                <input type="file" name="photo" class="form-control-file" value="{{ $photos->photo }}">
                @if($errors->has('file'))
                    <ul>
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="album">Albums</label>
            <div class="form-group">
                <select class="form-control" id="album" name="album">
                    <option value="" class="text-muted" disabled>kies een optie</option>
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}">{{$album->albumName}}</option>
                    @endforeach
                </select>
                @if($errors->has('album'))
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