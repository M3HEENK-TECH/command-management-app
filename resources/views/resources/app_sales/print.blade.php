@extends('layouts.print')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Ventes de  {{ $cashier->name  }} </h2>
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


@endsection
