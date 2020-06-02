@extends('layouts.print')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                @foreach($user as $u)
                <h2>Ventes de  {{ $u->name  }} </h2>
                @endforeach
            </div>

            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Produit</td>
                        <td>Quantité</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($print as $sale)
                        <tr>
                            <td>{{$sale->created_at}} </td>
                            <td>
                                {{$sale->name}}
                                <b>{{$sale->quantity}} {{$sale->unity}}</b> actuellement
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
