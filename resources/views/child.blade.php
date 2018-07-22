@extends('web.layouts.app')

@section('title', 'Demo')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    {{--@component('alert')--}}
        {{--<strong>Whoops!</strong> Something went wrong!--}}
        {{--@slot('title')--}}
            {{--Forbidden--}}
        {{--@endslot--}}
        {{--You are not allowed to access this resource!--}}
    {{--@endcomponent--}}
    @alert(['type' => 'danger'])
        @slot('title')
            Forbidden
        @endslot
        You are not allowed to access this resource!
    @endalert
@endsection