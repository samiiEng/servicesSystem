@extends('Layouts.master')
@section('title')
    dashboard
@endsection
@section('content')
    @parent
    {{--  define service  --}}
    <a href="{{route()}}">تعریف خدمت</a>

    <br>

    {{-- define installment --}}
    <a href="{{route()}}">تعریف اقساط</a>
    <br>

    {{--get service--}}

    <a href="{{route()}}">دریافت خدمت</a>


@endsection
