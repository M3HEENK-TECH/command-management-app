@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <h2>Gestion des Approvisionnements</h2>
            </div>

            <div class="col-lg-12 ">
            {!! Form::model($supply,[  "url"=> route("supplies.update",$supply) ,"files"=> true, "method" => "put" ]) !!}

                <div class="form-group">
                    {{ Form::label("quantity","Quantité")  }}
                    {{ Form::text("quantity",null,["class" => "form-control"])  }}
                </div>
                <div class="form-group">
                    {{ Form::label("price","Prix")  }}
                    {{ Form::text("price",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                    {{ Form::label("price","Fournisseur")  }}
                    {{ Form::select("provider_id",[],[],["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                  
                    {{ Form::hidden("confirmed_at",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                  
                    {{ Form::hidden("provider_id",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                   
                    {{ Form::hidden("product_id",null,["class" => "form-control"])  }}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">
                        mise à jour
                    </button>
                </div>

                {!! Form::close() !!}

            </div>


        </div>
    </div>


@endsection
