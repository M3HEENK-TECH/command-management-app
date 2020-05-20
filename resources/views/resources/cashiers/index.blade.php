@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row ">

    <div class="row ">
        <div class="col-lg-9">
            <h2>Lite des caissiers</h2>
            <button class="btn btn-outline btn-success" type="button" data-toggle="modal" data-target="#creation_modal"><i class="fa fa-plus"> Ajouter</i></button>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="row">
            <div class="col-lg-12">{{ $cashiers->links()  }}</div>

            @foreach($cashiers as $item)

                <div class="col-lg-3">
                    <div class="contact-box center-version" style="border-color:grey;">

                        <a>

                            <img alt="image" class="img-circle" src="{{ $item->url  }}">


                            <h3 class="m-b-xs"><strong>{{$item->name}}</strong></h3>

                            <div class="font-bold">Caissier</div>
                            <address class="m-t-md">
                            {{$item->email}}<br>
                            </address>

                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#edition_modal{{$item->id}}"><i class="fa fa-pencil"></i> Modifier </a>
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_modal{{$item->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>


    </div>


    <!-- Liste des modals -->

        <!-- Modal d'ajout -->
        <div class="modal inmodal fade" id="creation_modal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Caissier</h4>
                        </div>

                        <div class="modal-body">

                            {!! Form::open([ "url"=> route("cashiers.store") ,"files"=> true, "method" => "post" ]) !!}

                                <div class="form-group">
                                    {{ Form::label("name","Nom")  }}
                                    {{ Form::text("name",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label("email","Email")  }}
                                    {{ Form::text("email",null,["class" => "form-control"])  }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label("password","Mot de passe")  }}
                                    {{ Form::password("password",["class" => "form-control"])  }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label("password_confirmation","Confirmé mot de passe")  }}
                                    {{ Form::password("password_confirmation",["class" => "form-control"])  }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label("profile_image","Image de profil")  }}
                                    {{ Form::file("profile_image",["class" => "form-control"])  }}
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" >Enregistrer</button>
                                </div>

                                {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal de modifiation -->
        @foreach($cashiers as $item)

            <div class="modal inmodal fade" id="edition_modal{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Caissier</h4>
                        </div>

                        <div class="modal-body">

                            {!! Form::model($item,[  "url"=> route("cashiers.update",$item->id) ,"files"=> true, "method" => "put" ]) !!}

                            <div class="form-group">
                                {{ Form::label("name","Nom")  }}
                                {{ Form::text("name",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group">
                                {{ Form::label("email","Email")  }}
                                {{ Form::text("email",null,["class" => "form-control"])  }}
                            </div>
                            <div class="form-group">
                                {{ Form::label("password","Mot de passe")  }}
                                {{ Form::password("password",["class" => "form-control"])  }}
                            </div>

                            <div class="form-group">
                                {{ Form::label("password_confirmation","Mot de passe")  }}
                                {{ Form::password("password_confirmation",["class" => "form-control"])  }}
                            </div>

                            <div class="form-group">
                                {{ Form::label("profile_image","Image de profil")  }}
                                {{ Form::file("profile_image",["class" => "form-control"])  }}
                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" >Enregistrer</button>
                                </div>

                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <!-- Modal de suppression -->
        @foreach($cashiers as $item)

            <div class="modal inmodal fade" id="delete_modal{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-exclation-circle modal-icon" style="color:red"></i>
                            <h4 class="modal-title">ATTENTION !!</h4>
                            <h3>voulez-vous vraiment supprime cet élément ?</h3>
                        </div>

                        <form action="{{route("cashiers.destroy",$item->id)}}" method="POST">
                            @method('delete')
                            @csrf

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                                <button type="submit" class="btn btn-success">OK</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de modifiation -->
    <div class="modal inmodal fade" id="edition_modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Caissier</h4>
                </div>

                <div class="modal-body">

                    <form action="" method="post">

            <div class="col-lg-8">
                <h2>Gestion des caissiers</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("cashiers.create")}}" class="btn btn-primary">Ajouter</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Profile</td>
                        <td>Date</td>
                        <td >Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cashiers as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <img src="{{ $item->url  }}" alt="" height="50" width="50">
                            </td>
                            <td>
                                    <span class="badge badge-primary">
                                       Creation : {{$item->created_at}}
                                    </span>
                                <span class="badge badge-primary">
                                       Mise a jour :  {{$item->updated_at}}
                                    </span>
                            </td>
                            <td>
                                <form action="{{route("cashiers.destroy",$item)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route("cashiers.edit",$item)}}" class="btn btn-primary">
                                        Modifier
                                    </a>
                                    <button onclick="return confirm('Supprimer {{$item->name}} ? ')" class="btn btn-danger" type="submit">Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

        @endforeach

    <!-- Fin de la Liste -->

@endsection
