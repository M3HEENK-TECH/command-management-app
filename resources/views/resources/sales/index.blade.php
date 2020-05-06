@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Vente</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("sales.create")}}" class="btn btn-dark">Ajouter</a>
                <a href="{{route("sales.create")}}" class="btn btn-dark">Vendre</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Quantité</td>
                        <td>Produit</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $item)
                        <tr>
                            <td></td>
                            <td> {{$item['quantity']}} </td>
                            <td> {{$item["product"]->name}} </td>
                            <td>
                                <form action="{{route("sales.destroy",$item["product"])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route("sales.edit",$item["product"])}}" class="btn btn-dark">
                                        Modifier
                                    </a>
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
