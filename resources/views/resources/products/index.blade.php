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

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">

                            <button class="btn btn-outline btn-success" type="button" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"> Ajouter</i>
                            </button>

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal5{{$product->id}}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4{{$product->id}}">
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
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                        <h4 class="modal-title">Nouveau produit</h4>

                    </div>

                    <form action="{{route("products.store")}}" method="post">
                        @csrf

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Nom" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control"  rows="3" name="description" placeholder="Description" ></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="quantity" placeholder="Quantité" class="form-control">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" name="price" placeholder="Prix de gros" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <select class="select2_demo_1 form-control" name="unity">
                                            <option>Sac</option>
                                            <option>Casier</option>
                                            <option>Bouteille</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="unity_price" placeholder="Prix unitaire" class="form-control">
                                    </div>

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

            <div class="modal inmodal" id="myModal5{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                            <h4 class="modal-title">Modification</h4>

                        </div>

                        <form action="{{route("products.update",$product->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control"  rows="3" name="description" >{{ $product->description }} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="quantity" value="{{ $product->quantity}}" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <input type="text" name="price" value="{{ $product->price}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <select class="select2_demo_1 form-control" name="unity">
                                                <option>{{ $product->unity}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="unity_price" value="{{ $product->unity_price}}" class="form-control">
                                        </div>

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

        @endforeach

        <!-- Modal de suppression -->
        @foreach($products as $product)

            <div class="modal inmodal fade" id="myModal4{{$product->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                            <h4 class="modal-title">ATTENTION !!</h4>
                            <h3>voulez-vous vraiment supprime cet élément ?</h3>
                        </div>

                        <form action="{{route("products.destroy",$product->id)}}"  method="POST">
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

