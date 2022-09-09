@extends('Layouts.master')
@section('title')
    login-form
@endsection
@section('content')
    @parent
    <form action="{{route('login')}}" method="post">
        @csrf
        <label for="email">email: </label>
        <input type="text" id="email" name="email"><br>

        <label for="password">password: </label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" name="submit" id="submit" value="login">
    </form>
@endsection
