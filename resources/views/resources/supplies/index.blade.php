@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-6">
                <h2>Gestion des caissiers</h2>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{route("supplies.create")}}" class="btn btn-dark">Ajouter</a> |
                <a href="{{route("supplies.index",["filter"=>"deleted"])}}" class="btn btn-dark">Approvisionements supprimer</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Quantité</td>
                        <td>Prix</td>
                        <td>Produit</td>
                        <td>Fournisseurs</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supplies as $item)
                        <tr>
                            <td>
                                {{$item->created_at}}
                                @if( !empty($item->confirmed_at) )
                                    <span class="badge badge-primary">Confirmer</span>
                                @else
                                    <span class="badge badge-danger">Nom confirmer</span>
                                @endif
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                @if( empty($item->deleted_at) )
                                <a href="{{route("supplies.edit",$item)}}" class="btn btn-dark">Modifier</a>
                                <a href="{{route("supplies.confirmed",["id"=>$item->id])}}" class="btn btn-primary">confirmer</a>
                                <form action="{{route("supplies.destroy",$item)}}" method="post"
                                      style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Supprimer {{$item->name}} ? ')"
                                            class="btn btn-danger" type="submit">Supprimer
                                    </button>
                                </form>
                                    @endif
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
