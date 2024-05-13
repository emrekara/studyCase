<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Etiya StudyCase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        *{
            color: #fff;
        }
        body{
            background: #242441;
        }
        h1,h2,h3,h4,h5,h6{
            color: #fff !important;
        }
        .card{
            background: transparent;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 3em;
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
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{asset('images/logo.svg')}}" style="max-height: 125px;margin: 2em;">
            <h1>Study Case</h1>
        </div>
    </div>
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
<!-- JAVASCRIPT -->
<script src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
