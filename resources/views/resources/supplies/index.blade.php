@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Gestion des caissiers</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("supplies.create")}}" class="btn btn-dark">Ajouter</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Quantité</td>
                        <td>Prix</td>
                        <td>Produit</td>
                        <td>Fournisseurs</td>
                        <td>Date</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supplies as $item)
                        <tr>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td> </td>
                            <td> </td>
                            <td>
                                    <span class="badge badge-primary">
                                       Creation : {{$item->created_at}}
                                    </span>
                                <span class="badge badge-primary">
                                       Mise a jour :  {{$item->updated_at}}
                                    </span>
                            </td>
                            <td>
                                <form action="{{route("supplies.destroy",$item)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route("supplies.edit",$item)}}" class="btn btn-dark">
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

            <div class="col-lg-12">
                {{ $supplies->links()  }}
            </div>

        </div>
    </div>


@endsection
