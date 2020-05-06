@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Panier</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("sales.create")}}" class="btn btn-dark">Ajouter un produit</a>
                <a href="{{route("app_sales.store")}}" class="btn btn-dark">Vendre</a>
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
                    @foreach($sales as $item)
                        <tr>
                            <td> {{$item['quantity']}} </td>
                            <td> {{$item["product"]->name}} </td>
                            <td>
                                <form action="{{route("sales.destroy",$item["product"])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Supprimer {{$item["product"]->name}} ? ')"
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
