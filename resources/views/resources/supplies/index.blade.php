@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-10">
            <h2>Gestion des approvisionnements</h2>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Liste des approvisionnements</h5>

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
                                <a href="{{route("supplies.index",["filter"=>"deleted"])}}" class="btn btn-outline btn-danger" >
                                    Corbeille
                                </a>

                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Produits</th>
                                        <th>Quantité</th>
                                        <th>Prix</th>
                                        <th>Fournisseur</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($supplies as $key=> $item)

                                        <tr class="">

                                            <td>{{$key+1}}</td>
                                            <td>
                                                {{$item->created_at}}
                                                @if( !empty($item->confirmed_at) )
                                                    <span class="badge badge-primary">Confirmer</span>
                                                @else
                                                    <span class="badge badge-danger">Nom confirmer</span>
                                                @endif
                                            </td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->price}}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal5{{$item->id}}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4{{$item->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="{{route("supplies.confirmed",["id"=>$item->id])}}" type="button" class="btn btn-xs btn-primary">confirmer</a>
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

                <form action="route("supplies.store")" method="POST">
                @method('POST')
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="select2_demo_1 form-control" name="">
                                    <option>Fournisseur</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="quantity" placeholder="Quantité" class="form-control">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" name="price" placeholder="Prix" class="form-control">
                            </div>

                            <div class="form-group">
                                <select class="select2_demo_1 form-control" name="">
                                    <option>Fournisseur</option>

                                </select>
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
    @foreach($supplies as $item)

        <div class="modal inmodal" id="myModal5{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                        <h4 class="modal-title">Modification</h4>

                    </div>

                    <form action="{{route("supplies.update",$item->id)}}" method="">
                        @method('put')
                        @csrf

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{$item->product_id}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="quantity" value="{{$item->quantity}}" class="form-control">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" name="price" value="{{$item->price}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <select class="select2_demo_1 form-control" name="fournisseur">
                                            <option>{{$item->provider_id}}</option>
                                        </select>
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
    @foreach($supplies as $item)

        <div class="modal inmodal fade" id="myModal4{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                        <h4 class="modal-title">ATTENTION !!</h4>
                        <h3>voulez-vous vraiment supprime cet élément ?</h3>
                    </div>

                    <form action="{{route("supplies.destroy",$item->id)}}"  method="POST">
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
    <!-- Fin de Liste des modals -->


@endsection

