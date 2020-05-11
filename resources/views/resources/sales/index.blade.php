@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-6">
                <h2>Panier</h2>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{route("sales.create")}}" class="btn btn-dark">Ajouter un produit</a>
                {!! Form::open(['url' => route("sales.store"), 'method' => 'post',"style" => "display:inline-block"]) !!}
                    <button type="submit"  class="btn btn-success" onclick="return confirm('Vendre les produits du panier')">Vendre</button>
                {!! Form::close() !!}
                {!! Form::open(['url' => route("sales.destroy_all"), 'method' => 'delete',"style" => "display:inline-block"]) !!}
                    <button type="submit"  class="btn btn-danger" onclick="return confirm('Vider le panier')">Vider le panier</button>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Quantité</td>
                        <td>Produit</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $key => $item)
                        <tr>
                            <td> {{$item['quantity']}} </td>
                            <td> {{$item["product"]->name}} </td>
                            <td>
                                <form action="{{route("sales.destroy",["sale_key" => $key ])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Supprimer la vente  ')"
                                            class="btn btn-danger" type="submit">Supprimer
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


@endsection
