@extends('Layouts.master')
@yield('title', 'register-form')
@section('content')
    @parent
    <form action="{{route('register')}}" method="post">

        @csrf
        <label for="firstName">firstName: </label>
        <input type="text" id="firstName" name="firstName">

        <label for="lastName">lastName: </label>
        <input type="text" id="lastName" name="lastName">

        <label for="username">username: </label>
        <input type="text" id="username" name="username">

        <label for="password"></label>
        <input type="password" name="password" id="password">

        <label for="imagePath">image: </label>
        <input type="file" name="imagePath" id="imagePath">

        <label for="email">email: </label>
        <input type="email" name="email" id="email">

        <label for="idCardPath">idCard: </label>
        <input type="file" name="idCardPath" id="idCardPath">

        <input type="submit" name="submit" id="submit" value="register">

    </form>
@endsection
