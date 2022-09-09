@extends('Layouts.master')
@section('title')
    dashboard
@endsection
@section('content')
    @parent
    {{-- define categories --}}
    <a href="{{route('defineCategories')}}">تعریف دسته ها</a>
    <br>

    {{--  define service  --}}
    <a href="{{route('defineService')}}">تعریف خدمت</a>
    <br>

    {{-- define installment --}}
    <a href="{{route('defineInstallment')}}">تعریف اقساط</a>
    <br>

    {{-- define custom service --}}
    <a href="{{route('defineCustomServiceForm')}}">تعریف اقساط برای یک مشتری خاص</a>
    <br>

    {{--get service--}}

    <a href="{{route('findService')}}">دریافت خدمت</a>
    <br>

    {{--   logout --}}
    <a href="{{route('logout')}}">Logout</a>


@endsection
