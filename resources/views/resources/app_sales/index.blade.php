@extends('layouts.app')

@section('content')

    <div class="col-lg-6">
        @if ( !empty($cashier) )
            <h2>Ventes de {{$cashier->name}} </h2>
        @else
            <h2>Ventes de caissiers</h2>
        @endif

    </div>

    <div class="col-lg-6 text-right">
        {{--
        @if ( !empty($cashiers) )

            <div class="dropdown" style="display: inline-block" >
                <a id="cashier_sales" class="btn btn-primary dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Voir les ventes de </a>
                <ul aria-labelledby="cashier_sales" class="dropdown-menu dropdown-menu-right">
                    @foreach($cashiers as $cashier)
                        <li>
                            <a class="" href="{{route("app_sales.index",['user_id'=> $cashier->id ])}}">
                                {{ $cashier->name  }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="dropdown" style="display: inline-block" >
                <a id="cashier_print" class="btn btn-primary dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Imprimer les ventes de </a>
                <ul aria-labelledby="cashier_print" class="dropdown-menu dropdown-menu-right">
                    @foreach($cashiers as $cashier)
                        <li>
                            <a class="" href="{{route("app_sales.print",['cashier'=> $cashier->id ])}}">
                                {{ $cashier->name  }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        @else
            <div class="dropdown ">
                <a class="btn btn-primary" href="{{route("app_sales.print",['cashier'=> auth()->user()->id ])}}" >
                    Imprimer mes ventes </a>

            </div>
        @endif
        --}}

    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Liste des ventes des caissiers</h5>


                        <div class="ibox-content">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Caissier</th>
                                        <th>Date</th>
                                        <th>Produit</th>
                                        <th>Quantité</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sales as $key=> $sale)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td> {{$sale->cashier->name}} </td>
                                            <td>{{$sale->created_at->diffForHumans()}} </td>
                                            <td>
                                                {{$sale->product->name}}
                                                <b>{{$sale->product->quantity}} {{$sale->product->unity}}</b> actuellement
                                            </td>
                                            <td>{{$sale->quantity}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
