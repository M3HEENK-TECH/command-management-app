@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <h2>Panier</h2>

    </div>
    <div class="col-lg-2">

<<<<<<< Updated upstream
            <div class="col-lg-6">
                <h2>Panier</h2>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{route("sales.create")}}" class="btn btn-dark">Ajouter un produit</a>
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
=======
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">

            <form action="{{route("sales.store")}}" method="POST">
                @csrf
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="control-label" for="product_name">Produit</label>
                        <select name="product_id" id="product_id" class="form-control">
                            
                                <option value="">
                                    Liste des produits
                                </option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label" for="quantity">Quantité</label>
                        <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-sm btn-success" style="margin-top: 26px;">
                        <i class="fa fa-plus"> Ajouter</i>
                    </button>
                </div>

            </form>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>

                            <th data-toggle="true">#</th>
                            <th data-toggle="true">Nom du produit</th>
                            <th data-toggle="true">Quantité</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($sales as $key => $item)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td> {{$item['quantity']}} </td>
                                    <td> {{$item["product"]->name}} </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4{{["sale_key" => $key ]}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                
                                <th style="font-size: 20px;">Total</th>
                                <td></td>
                                <th style="font-size: 20px;">{{  $sales_total  }}</th>
                                <td></td>
                            </tr>

                            

                        
                            <tr>
                                <td >

                                    <form action="{{route("app_sales.store")}}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary">
                                            Vendre
                                        </button>
                                    </form>

                                </td>
                                
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal3">
                                        Vider le panier
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>


</div>



<!-- Modal de suppression d'un élément -->
@foreach($sales as $key => $item)

    <div class="modal inmodal fade" id="myModal4{{["sale_key" => $key ]}}" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                    <h4 class="modal-title">ATTENTION !!</h4>
                    <h3>voulez-vous retirer cet élément du panier ?</h3>
                </div>

                <form action="{{route("sales.destroy")}}" method="post">
                    @method('DELETE')
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach

<!-- Modal de suppression pour vider tout le panier -->
<div class="modal inmodal fade" id="myModal3" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                <h4 class="modal-title">ATTENTION !!</h4>
                <h3>voulez-vous vider tout le panier ?</h3>
            </div>

            <form action="{{route("sales.destroy_all")}}" method="POST">
                @method('DELETE')
                @csrf

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                    <button type="submit" class="btn btn-primary">OUI</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
