@extends('Layouts.master')
@section('title')
    dashboard
@endsection
@section('content')
    <?php echo "hello";
    print_r(\Illuminate\Support\Facades\Auth::id());
    ?>
    @parent
    {{--  define service  --}}
    <a href="{{route('defineService')}}">تعریف خدمت</a>

    <br>

    {{-- define installment --}}
    <a href="{{route('defineInstallment')}}">تعریف اقساط</a>
    <br>

    {{--get service--}}

    <a href="{{route('findService')}}">دریافت خدمت</a>
    <br>

    {{--   logout --}}
    <a href="{{route('logout')}}">Logout</a>


@endsection
