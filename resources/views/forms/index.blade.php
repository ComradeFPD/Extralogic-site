@extends('layouts.app')
@section('content')
    <div id="app">
        <forms-index url="{{ env('API_URL') }}"></forms-index>
    </div>
    @endsection