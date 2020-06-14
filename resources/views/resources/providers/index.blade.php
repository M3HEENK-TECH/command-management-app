@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <h2>Liste des fournisseurs</h2>
            <button class="btn btn-outline btn-primary" type="button" data-toggle="modal" data-target="#myModal6"><i class="fa fa-plus"> Ajouter</i></button>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

            <div class="col-lg-12">
                {{ $providers->links()  }}
            </div>

            @foreach($providers as $provider)

                <div class="col-md-3" style="margin-bottom: 10px;">
                    <div   class="ibox-content text-center"  @if($provider->deleted_at) class="has-background-grey-lighter" @endif >
                        <h1>{{ $provider->name }}</h1>
                        <div class="m-b-sm">
                            <img alt="image" class="img-circle" src="assets/img/im3.png">
                        </div>
                        <p class="font-bold">Fournisseur</p>

                        <div class="text-center">
                            <a class="btn btn-xs btn-success"  type="button" data-toggle="modal" data-target="#myModal7{{$provider->id}}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger"  type="button" data-toggle="modal" data-target="#myModal4{{$provider->id}}"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>



    <!-- Liste des modals -->

        <!-- Modal d'ajout -->
        <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog  ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Fournisseur</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{ route('providers.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom du Fourniesseur" class="form-control">
                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" >Enregistrer</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de modifiation -->
        @foreach($providers as $provider)

            <div class="modal inmodal fade" id="myModal7{{$provider->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Caissier</h4>
                        </div>

                        <div class="modal-body">

                            <form action="{{ route('providers.update', $provider->id) }}" method="post">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" value="{{$provider->name}}"  class="form-control">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" >Enregistrer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach


        <!-- Modal de suppression -->
        @foreach($providers as $provider)

            <div class="modal inmodal fade" id="myModal4{{$provider->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-exclamation-circle modal-icon" style="color:red"></i>
                            <h4 class="modal-title">ATTENTION !!</h4>
                            <h3>voulez-vous vraiment supprime cet élément ?</h3>
                        </div>

                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        @endforeach

    <!-- Fin de la Liste -->

@endsection


