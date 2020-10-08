@extends('layouts.app')
@section('content')
    <div id="app">
        <forms-create url="{{ env('API_URL') }}" is-create="{{ $isCreate }}" form="" id="{{ $id }}" uuid="{{ $uid }}"></forms-create>
    </div>
    @endsection