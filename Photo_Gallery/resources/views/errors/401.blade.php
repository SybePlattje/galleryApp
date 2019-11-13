@extends('layouts.app')
@section('content')
    Error message:  {{ $exception->getMessage() }}
@endsection