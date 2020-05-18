
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-6">
                @if ( !empty($cashier) )
                    <h2>Ventes de {{$cashier->name}} </h2>
                @else
                    <h2>Ventes de caissiers</h2>
                @endif

            </div>

            <div class="col-lg-6 text-right">
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

            </div>

            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Casissier</td>
                        <td>Date</td>
                        <td>Produit</td>
                        <td>Quantité</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
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

    <div class="col-lg-12">
        {{ $sales->links()  }}
    </div>

@endsection
