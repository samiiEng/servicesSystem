@extends('Layouts.master')
@yield('title', 'define-custom-service')
@section('content')
    <form action="{{route('defineCustomService')}}" method="post">
        @csrf
        <label for=""></label>
        <input type="text">


        <label for=""></label>
        <input type="text">


        <label for=""></label>
        <input type="text">

        <input type="submit" name="submit" id="submit" value="submit">
    </form>
@endsection
