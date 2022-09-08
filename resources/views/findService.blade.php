@extends('Layouts.master')
@yield('title', 'find-service')
@section('content')

    <div class="filters">
        <form action="{{route('findServiceResult')}}" method="post">
            @csrf
            <ul>
                @foreach($categories as $category)
                    <?php $i = true;?>
                    @foreach($category as $value)
                        @if($i)
                            <input type="radio" name="radio" id="radio" value="{{$value['name']}}">
                            <br><br>
                            <?php $i = false;?>
                        @endif
                        <ul>
                            <input type="radio" name="radio" id="radio" value="{{$value['name']}}">
                            <br><br>
                        </ul>
                    @endforeach
                @endforeach
            </ul>
            <input type="submit" name="submit" id="submit" value="submit">
        </form>
    </div>

    <div class="results">
        <form action="{{route('order')}}" method="post">
            @csrf
            @if(!empty($services))
                @foreach($services as $service)
                    <div>
                        <p>
                            <?php
                            $serviceName = \App\Models\Category::where("category_ref_id", $service['category_ref_id'])->get("name");
                            ?>
                            {{$serviceName}}
                        </p>
                        <p>
                            <?php
                            $userName = \App\Models\User::where("user_id", $service['user_ref_id'])->get();
                            ?>
                            {{$userName['first_name']}} {{$lastName['last_name']}}
                        </p>
                        <p>{{$service['details']}}</p>
                        <p>{{$service['cost']}}</p>
                        <p>
                            <?php
                            $installment = \App\Models\Installment::where("installment_ref_id", $service['installment_ref_id'])->get();
                            ?>
                            {{$installment['name']}}
                        </p>
                        <p>{{$installment['details']}}</p>
                    </div>
                @endforeach
            @endif

            <label for="installment">installment: </label>
            <input type="radio" name="paymentType" id="installment">

            <label for="cash">cash: </label>
            <input type="radio" name="paymentType" id="cash">

            <input type="submit" name="submit" id="submit" value="buy">
        </form>
    </div>

@endsection
