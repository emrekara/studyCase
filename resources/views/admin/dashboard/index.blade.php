@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            @if($cur_rows)
                @foreach($cur_rows as $cur_row)
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <div class="card-title">{{$cur_row["name"]}}</div>
                            <div class="card-body">
                                <span class="symbol">{{$cur_row["symbol"]}}</span>
                                <span class="price">{{$cur_row["amount"]}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection

@section('css')
    <style type="text/css">
        .card{
            background: #242441;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 3em;
            color: #fff;
        }
        .card .card-title{
            text-transform: uppercase;
            border-bottom: 1px solid #ccc;
            padding: .5em;
            font-size: 2em;
        }
        .card .card-body{
            font-size: 3em;
        }
        .card .card-body .symbol{

        }
        .card .card-body .price{

        }
    </style>

@endsection

@section('js')

@endsection
