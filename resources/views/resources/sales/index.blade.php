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
                        <td>Date</td>
                        <td >Action </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach([] as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td> {{$item->quantity}} </td>
                            <td> {{$item->price}} </td>
                            <td> {{$item->unity}} </td>
                            <td> {{$item->unity_price}} </td>
                            <td>
                                    <span class="badge badge-primary">
                                       Creation : {{$item->created_at}}
                                    </span>
                                <span class="badge badge-primary">
                                       Mise a jour :  {{$item->updated_at}}
                                    </span>
                            </td>
                            <td>
                                <form action="{{route("sales.destroy",$item)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route("sales.edit",$item)}}" class="btn btn-dark">
                                        Modifier
                                    </a>
                                    <button onclick="return confirm('Supprimer {{$item->name}} ? ')" class="btn btn-danger" type="submit">Supprimer
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
