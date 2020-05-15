@extends('layouts.app')

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
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">
                                    {{ $product->name }} ( {{ $product->quantity }} {{ $product->unity }}  )
                                </option>
                            @endforeach
                        </select>
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
