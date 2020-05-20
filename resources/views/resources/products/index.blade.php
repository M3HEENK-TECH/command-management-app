@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <h2>Gestion des produits</h2>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Liste des produits en stock</h5>
                        <div class="ibox-content">
                            <div class="table-responsive">

                                <button class="btn btn-outline btn-success" type="button" data-toggle="modal"
                                        data-target="#creation_modal">
                                    <i class="fa fa-plus"> Ajouter</i>
                                </button>

                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Quantité</th>
                                        <th>Prix de gros</th>
                                        <th>Unité</th>
                                        <th>Prix unitaire</th>
                                        <th>Date</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($products as $key=>  $product)
                                        <tr class="">
                                            <td>{{$key+1}}</td>
                                            <td>{{$product->name}}</td>
                                            <td> {{$product->quantity}} </td>
                                            <td> {{$product->price}} </td>
                                            <td> {{$product->unity}} </td>
                                            <td> {{$product->unity_price}} </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                Créé le : {{$product->created_at}}
                                                </span>
                                                <span class="badge badge-primary">
                                                Modifié le :  {{$product->updated_at}}
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                                        data-target="#edition_modal{{$product->id}}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                                        data-target="#delete_modal{{$product->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
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


    <!-- Liste des modals -->

    <!-- Modal d'ajout -->
    <div class="modal inmodal" id="creation_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <h4 class="modal-title">Nouveau produit</h4>

                </div>

                <form action="{{route("products.store")}}" method="post">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-lg-12">
                                {{ Form::label("name","Nom")  }}
                                {{ Form::text("name",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group col-lg-6">
                                {{ Form::label("quantity","Quantité")  }}
                                {{ Form::text("quantity",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group col-lg-6">
                                {{ Form::label("price","Prix de gros")  }}
                                {{ Form::text("price",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group col-lg-6">
                                {{ Form::label("unity","Unité")  }}
                                {{ Form::text("unity",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group col-lg-6">
                                {{ Form::label("unity_price","Prix de unitaire")  }}
                                {{ Form::text("unity_price",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group col-lg-12">
                                {{ Form::label("description","Description")  }}
                                {{ Form::textarea("description",null,["class" => "form-control"])  }}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal de modification -->
    @foreach($products as $product)

        <div class="modal inmodal" id="edition_modal{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>

                        <h4 class="modal-title">Modification</h4>

                    </div>

                    {!! Form::model($product,[  "url"=> route("products.update",$product) ,"files"=> true, "method" => "put" ]) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    {{ Form::label("name","Nom")  }}
                                    {{ Form::text("name",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group col-lg-6">
                                    {{ Form::label("quantity","Quantité")  }}
                                    {{ Form::text("quantity",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group col-lg-6">
                                    {{ Form::label("price","Prix de gros")  }}
                                    {{ Form::text("price",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group col-lg-6">
                                    {{ Form::label("unity","Unité")  }}
                                    {{ Form::text("unity",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group col-lg-6">
                                    {{ Form::label("unity_price","Prix de unitaire")  }}
                                    {{ Form::text("unity_price",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group col-lg-12">
                                    {{ Form::label("description","Description")  }}
                                    {{ Form::textarea("description",null,["class" => "form-control"])  }}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    @endforeach

    <!-- Modal de suppression -->
    @foreach($products as $product)

        <div class="modal inmodal fade" id="delete_modal{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                        <h4 class="modal-title">ATTENTION !!</h4>
                        <h3>voulez-vous vraiment supprime cet élément ?</h3>
                    </div>

                    <form action="{{route("products.destroy",$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                            <button type="submit" class="btn btn-success">OUI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

    <!--Fin de Liste des modals -->

@endsection

