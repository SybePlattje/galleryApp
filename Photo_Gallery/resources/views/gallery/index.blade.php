@extends('layouts.app')
@section('title', 'Gallery')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-5">

                <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="all">all</button>
                @foreach($albums as $album)
                    <button type="button" class="btn btn-outline-black waves-effect filter"
                            data-rel="{{$album->id}}">{{$album->albumName}}</button>
                @endforeach
            </div>
        </div>

        <div class="gallery" id="gallery">
            @foreach($photos as $photo)
                <div class="mb-3 pics animation all {{$photo->album_id}}">
                    <img src="{{asset('public/images/'.$photo->photo.'/'.$photo->photo)}}" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection
