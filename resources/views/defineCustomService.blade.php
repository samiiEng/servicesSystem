@extends('Layouts.master')
@yield('title', 'define-custom-service')
@section('content')

        <table>
            <tr>
                <th>details</th>
                <th>cost</th>
            </tr>
            @foreach($finalServices as $finalService)
                <tr>
                    <td>{{$finalService['details']}}</td>
                    <td>{{$finalService['cost']}}</td>
                </tr>
            @endforeach
        </table>


    <form action="{{route('defineCustomService')}}" method="post">
        @csrf

        <label for="serverID">serverID: </label>
        <input type="number" name="serverID" id="serverID">

        <label for="customerID">customerID: </label>
        <input type="number" name="customerID" id="customerID">

        <label for="details">details: </label>
        <input type="text" name="details" id="details">

        <label for="cost">cost: </label>
        <input type="text" name="cost" id="cost">

        <label for="installment">installment: </label>
        <input type="text" name="installment" id="installment">

        <input type="submit" name="submit" id="submit" value="submit">
    </form>
@endsection
