@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-6">
                <h2>Panier</h2>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{route("sales.create")}}" class="btn btn-primary">Ajouter un produit</a>
                {!! Form::open(['url' => route("app_sales.store"), 'method' => 'post',"style" => "display:inline-block"]) !!}
                    <button type="submit"  class="btn btn-success" onclick="return confirm('Vendre les produits du panier')">Vendre</button>
                {!! Form::close() !!}
                {!! Form::open(['url' => route("sales.destroy_all"), 'method' => 'delete',"style" => "display:inline-block"]) !!}
                    <button type="submit"  class="btn btn-danger" onclick="return confirm('Vider le panier')">Vider le panier</button>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Quantité</td>
                        <td>Produit</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $prod)
                        @php($get_sale = false) @php($prod_number = 0) @php($prod_price = 0)
                        @foreach($sales as $key => $item)
                            @if ( $prod->id === $item["product"]->id  )
                                @php($get_sale = true)  @php($prod_number++) @php($prod_price += ($item["quantity"] * $item["product"]->unity_price) )
                            @endif
                        @endforeach
                        @if ($get_sale)
                            <tr class="table-primary" style="font-weight: bold">
                                <td> {{ $prod->name  }} </td>
                                <td>Nombre: {{$prod_number}}</td>
                                <td colspan="2"> Prix: {{ $prod_price  }} FCFA</td>
                            </tr>
                        @endif
                        @foreach($sales as $key => $item)
                            @if ( $prod->id === $item["product"]->id  )
                                <tr>
                                    <td> {{$item['quantity']}} </td>
                                    <td> {{$item["product"]->name  }} </td>
                                    <td>
                                        <form action="{{route("sales.destroy",["sale_key" => $key ])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Supprimer la vente  ')"
                                                    class="btn btn-danger" type="submit">Supprimer
                                            </button>
                                        </form>
                                    </td>
                                <!--td> {{ $item["product"]->quantity  }} {{ $item["product"]->unity  }} ({{ $item["product"]->unity_price  }} l'unitée)
                                </td-->
                                </tr>
                            @endif
                        @endforeach

                    @endforeach
                    </tbody>
                    <tr class="table-primary" style="font-weight: bold">
                        <td>Nombre total</td>
                        <td>Quantité total</td>
                        <td colspan="2">Prix total</td>
                    </tr>
                    <tr style="font-weight: bold">
                        <td>{{  $sales_total_number }}</td>
                        <td >{{  $sales_total  }}</td>
                        <td colspan="2">{{  $sales_total_price  }} FCFA</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>


@endsection
