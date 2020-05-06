@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des produits</h2>
                <h4>Editer le produit {{ $product->name }}</h4>
            </div>

            <div class="col-lg-12 ">
                {!! Form::model($product,[  "url"=> route("products.update",$product) ,"files"=> true, "method" => "put" ]) !!}

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
                    {{ Form::textarea("description",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-dark">
                        mettre a jour
                    </button>
                </div>

                {!! Form::close() !!}

            </div>


        </div>
    </div>


@endsection
