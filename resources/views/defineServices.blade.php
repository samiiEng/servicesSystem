@extends('Layouts.master')
@section('title')
    define-services
@endsection
@section('content')
    @parent
    <table>
        <tr>
            <th>categoryID</th>
            <th>name</th>
            <th>parentID</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category['category_id']}}</td>
                <td>{{$category['name']}}</td>
                <td>{{$category['parent_ref_id']}}</td>
            </tr>
        @endforeach
    </table>

    <table>
        <tr>
            <th>installmentID</th>
            <th>name</th>
            <th>details</th>
        </tr>
        @foreach($installments as $installment)
            <tr>
                <th>{{$installment['installment_id']}}</th>
                <th>{{$installment['name']}}</th>
                <th>{{$installment['details']}}</th>
            </tr>
        @endforeach
    </table>

    <form action="{{route('storeService')}}" method="post">
        @csrf
        <label for="categoryID">categoryID: </label>
        <input type="number" id="categoryID" name="categoryID"><br>

        <label for="installmentID">installmentID: </label>
        <input type="number" id="installmentID" name="installmentID"><br>

        <label for="cost">cost: </label>
        <input type="text" name="cost" id="cost"><br>

        <label for="details">details: </label>
        <input type="text" name="details" id="details"><br>

        <input type="submit" name="submit" id="submit" value="submit">
    </form>
@endsection
