@extends('Layouts.master')
@section('title')
    define-installment
@endsection
@section('content')
    <table>
        <tr>
            <th>serviceID</th>
            <th>serviceName</th>
        </tr>
        @foreach($services as $service)
            <tr>
                <td>{{$service['service_id']}}</td>
                <td>{{$service['name']}}</td>
            </tr>
        @endforeach
    </table>

    <form action="{{route('storeInstallment')}}" method="post">
        <label for="name">name: </label>
        <input type="text" name="name" id="name"><br>

        <label for="serviceID">serviceID: </label>
        <input type="number" name="serviceID" id="serviceID"><br>

        <label for="details">details: </label>
        <input type="text" name="details" id="details"><br>

        <input type="submit" value="submit" name="submit" id="submit">
    </form>
@endsection
