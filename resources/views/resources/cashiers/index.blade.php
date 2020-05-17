@extends('layouts.app')

@section('content')


    <div class="row ">
        <div class="col-lg-9">
            <h2>Lite des caissiers</h2>
            <button class="btn btn-outline btn-success" type="button" data-toggle="modal" data-target="#myModal6"><i class="fa fa-plus"> Ajouter</i></button>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

            @foreach($cashiers as $item)

                <div class="col-lg-3">
                    <div class="contact-box center-version" style="border-color:grey;">

                        <a href="profile.html">

                            <img alt="image" class="img-circle" src="{{ $item->url  }}">


                            <h3 class="m-b-xs"><strong>{{$item->name}}</strong></h3>

                            <div class="font-bold">Caissier</div>
                            <address class="m-t-md">
<<<<<<< Updated upstream
                                {{$item->email}}<br>
=======
                            {{$item->email}}<br>
>>>>>>> Stashed changes
                            </address>

                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
<<<<<<< Updated upstream
                                <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal7"><i class="fa fa-pencil"></i> Modifier </a>
=======
                                <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal7{{$item->id}}"><i class="fa fa-pencil"></i> Modifier </a>
>>>>>>> Stashed changes
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4{{$item->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>
    </div>


    <!-- Liste des modals -->

<<<<<<< Updated upstream
    <!-- Modal d'ajout -->
    <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Caissier</h4>
                </div>

                <div class="modal-body">

                    <form action="" method="post">

                        <div class="form-group">
                            <input type="text" name="nom" placeholder="Nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" >Enregistrer</button>
                        </div>

                    </form>
=======
        <!-- Modal d'ajout -->
        <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Caissier</h4>
                        </div>

                        <div class="modal-body">

                            <form action="{{route("cashiers.store")}}" method="post">

                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Nom" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Mot de passe" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="file" name="profile" class="form-control"> 
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" >Enregistrer</button>
                                </div>

                            </form>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal de modifiation -->
        @foreach($cashiers as $item)

            <div class="modal inmodal fade" id="myModal7{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Caissier</h4>
                        </div>

                        <div class="modal-body">

                            <form action="{{route("cashiers.update",$item->id)}}" method="post">

                                <div class="form-group">
                                    <input type="text" name="name" value="{{$item->name}}" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{$item->email}}" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="file" name="photo" class="form-control"> 
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" >Enregistrer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        
        <!-- Modal de suppression -->
        @foreach($cashiers as $item)

            <div class="modal inmodal fade" id="myModal4{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-exclation-circle modal-icon" style="color:red"></i>
                            <h4 class="modal-title">ATTENTION !!</h4>
                            <h3>voulez-vous vraiment supprime cet élément ?</h3>
                        </div>

                        <form action="{{route("cashiers.destroy",$item->id)}}" method="">
                            @method('delete')
                            @csrf

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                                <button type="submit" class="btn btn-success">OK</button>
                            </div>

                        </form>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de modifiation -->
    <div class="modal inmodal fade" id="myModal7" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Caissier</h4>
                </div>

                <div class="modal-body">

                    <form action="" method="post">

<<<<<<< Updated upstream
                        <div class="form-group">
                            <input type="text" name="numero"  class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email"  class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" >Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de suppression -->
    @foreach($cashiers as $item)

        <div class="modal inmodal fade" id="myModal4{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-times modal-icon" style="color:red"></i>
                        <h4 class="modal-title">ATTENTION !!</h4>
                        <h3>voulez-vous vraiment supprime cet élément ?</h3>
                    </div>

                    <form action="{{route("cashiers.destroy",$item)}}" method="POST">
                        @method('delete')
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

=======
        @endforeach

>>>>>>> Stashed changes
    <!-- Fin de la Liste -->

@endsection

