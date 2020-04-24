@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des produits</h2>
            </div>

            <div class="col-lg-12 ">
                {!! Form::open([ "url"=> route("products.store") ,"files"=> true, "method" => "post" ]) !!}

                <div class="form-group">
                    {{ Form::label("name","Nom")  }}
                    {{ Form::text("name",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("quantity","Quantité")  }}
                    {{ Form::text("quantity",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("price","Prix de gros")  }}
                    {{ Form::text("price",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("unity","Unité")  }}
                    {{ Form::text("unity",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("unity_price","Prix de unitaire")  }}
                    {{ Form::text("unity_price",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("description","Description")  }}
                    {{ Form::text("description",null,["class" => "form-control"])  }}
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
