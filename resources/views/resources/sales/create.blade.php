@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Vente</h2>
            </div>


            <div class="col-lg-12">
                <div class="col-lg-12 ">
                    {!! Form::open([  "url"=> route("sales.store") ,"files"=> true, "method" => "post" ]) !!}

                    <div class="form-group">
                        {{ Form::label("product_id","Product")  }}
                        {{ Form::select("product_id",$products->pluck("name","id"),null,["class" => "form-control"])  }}
                    </div>

                    <div class="form-group">
                        {{ Form::label("quantity","Quantité")  }}
                        {{ Form::text("quantity",null,["class" => "form-control"])  }}
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
    </div>


@endsection
