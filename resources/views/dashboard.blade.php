@extends('Layouts.master')
@yield('title', 'dashboard')
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
