@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des Approvisionnement</h2>
            </div>

            <div class="col-lg-12 ">
                {!! Form::open([ "url"=> route("supplies.store") ,"files"=> true, "method" => "post" ]) !!}

                <div class="form-group">
                    {{ Form::label("quantity","Quantité")  }}
                    {{ Form::text("quantity",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("price","Prix")  }}
                    {{ Form::text("price",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                    {{ Form::label("provider_id","Fournisseur")  }}
                    {{ Form::select("provider_id",$providers->pluck("name","id"),null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                    {{ Form::label("product_id","Product")  }}
                    {{ Form::select("product_id",$products->pluck("name","id"),null,["class" => "form-control"])  }}
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
