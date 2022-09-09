@extends('Layouts.master')
@section('title')
    find-service
@endsection
@section('content')
{{print_r($finalCategories)}}
    <div class="filters">
        <form action="{{route('findServiceResult')}}" method="post">
            @csrf
            <ul>
                @foreach($finalCategories as $category)
                    <?php $i = true;?>
                    @foreach($category as $value)
                        @if($i)
                                {{$value->name}}
                            <br><br>
                            <?php $i = false;?>
                        @endif
                        <ul>
                            {{$value->name}}: <input type="radio" name="radio" value="{{$value->name}}">
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
                            {{$serviceName['name']}}
                                <input type="hidden" name="service" value="{{$serviceName['service_id']}}">
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
            <input type="radio" name="paymentType" value="0"><br>

            <label for="cash">cash: </label>
            <input type="radio" name="paymentType" value="1"><br>

            <input type="submit" name="submit" id="submit" value="buy">
        </form>
    </div>

@endsection
