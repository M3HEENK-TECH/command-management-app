@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des caissiers</h2>
            </div>

            <div class="col-lg-12 ">
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

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">
                        Ajouter
                    </button>
                </div>

                {!! Form::close() !!}

            </div>


        </div>
    </div>


@endsection
