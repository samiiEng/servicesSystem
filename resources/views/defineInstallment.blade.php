@extends('Layouts.master')
@section('title')
    define-installment
@endsection
@section('content')
    <form action="{{route('storeInstallment')}}" method="post">
        @csrf
        <label for="name">name: </label>
        <input type="text" name="installmentName" id="name"><br>

        <label for="details">details: </label>
        <input type="text" name="details" id="details"><br>

        <input type="submit" value="submit" name="submit" id="submit">
    </form>
@endsection
