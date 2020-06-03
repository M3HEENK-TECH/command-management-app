@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des caissiers</h2>
                <h4>Editer le caissier {{ $cashier->name }}</h4>
            </div>

            <div class="col-lg-12 ">
                {!! Form::model($cashier,[  "url"=> route("cashiers.update",$cashier) ,"files"=> true, "method" => "put" ]) !!}

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

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        mettre a jour
                    </button>
                </div>

                {!! Form::close() !!}

            </div>


        </div>
    </div>


@endsection
