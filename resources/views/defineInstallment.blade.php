@extends('Layouts.master')
@yield('title', 'define-installment')
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
        <label for="serviceID">serviceID: </label>
        <input type="number" name="serviceID" id="serviceID">

        <label for="details">details: </label>
        <input type="text" name="details" id="details">

        <input type="submit" value="submit" name="submit" id="submit">
    </form>
@endsection
