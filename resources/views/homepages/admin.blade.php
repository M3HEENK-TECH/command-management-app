@extends('layouts.app')

@section('content')
    <style>
        .equal-height {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    </style>

    {{--
    <div class="row">
        @foreach($counts_data as $datum)
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> {{ $datum['title']  }}</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"> {{ $datum['count']  }}  </h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    --}}

    <div class="row equal-height">
        @foreach($products_panels_data as $datum)
            <div class="col-lg-3" style="display: flex">
                <div class="panel panel-default h-100 " >
                    <div class="panel-heading">
                        <h5> {{ $datum['title']  }}</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $datum['small_text']  }} {{ $datum['count']  }}</p>
                        <ul class="list-group">
                            @foreach($datum['product'] as $iten)
                                <li class="list-group-item">
                                    {{ $iten->name  }}
                                    (  <b>
                                        {{ $iten->quantity  }}  {{ $iten->unity  }}
                                    </b>  )
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        @foreach($cashiers_panels_data as $datum)
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> {{ $datum['title']  }}</h5>
                    </div>
                    <div class="ibox-content">
                        <ul class="list-group">
                            @foreach($datum['cashier'] as $iten)
                                <li class="list-group-item flex-row">
                                    <div class="flex-column">
                                        <p>{{ $iten->name  }}</p>
                                        <p>{{ $iten->email  }}</p>
                                    </div>
                                    <div class="flex-column-">
                                        <img src="{{$iten->url}}" width="50" height="50" alt="">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ibox-footer">
                        <p>Nombre de ventes: {{ $datum['count']  }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
