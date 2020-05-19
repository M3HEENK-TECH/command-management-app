@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <h2>Panier</h2>

    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">

            <form action="{{route("sales.store")}}" method="POST">
                @csrf
                <div class="col-sm-5">
                    <div class="form-group">
                        {{ Form::label("product_id","Product")  }}
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">
                                    {{ $product->name }} ( {{ $product->quantity }} {{ $product->unity }}  )
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{ Form::label("quantity","Quantité")  }}
                        {{ Form::text("quantity",null,["class" => "form-control"])  }}
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
