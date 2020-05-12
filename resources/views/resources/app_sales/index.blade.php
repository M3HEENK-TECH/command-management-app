
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-6">
                <h2>Ventes de caissiers</h2>
            </div>

            <div class="col-lg-6 text-right">
                @if ( !empty($cashiers) )
                    <div class="dropdown ">
                        <a id="cashier_print" class="btn btn-dark dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Voir les ventes de </a>
                        <div aria-labelledby="cashier_print" class="bg-dark dropdown-menu dropdown-menu-right">
                            @foreach($cashiers as $cashier)
                                <a class="dropdown-item bg-dark text-white"
                                   href="{{route("app_sales.index",['user_id'=> $cashier->id ])}}">
                                    {{ $cashier->name  }} </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="dropdown ">
                        <a id="cashier_print" class="btn btn-dark dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Imprimer les ventes de </a>
                        <div aria-labelledby="cashier_print" class="bg-dark dropdown-menu dropdown-menu-right">
                            @foreach($cashiers as $cashier)
                                <a class="dropdown-item bg-dark text-white"
                                   href="{{route("app_sales.print",['cashier'=> $cashier->id ])}}">
                                    {{ $cashier->name  }} </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="dropdown ">
                        <a class="btn btn-dark" href="{{route("app_sales.print",['cashier'=> auth()->user()->id ])}}" >
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
