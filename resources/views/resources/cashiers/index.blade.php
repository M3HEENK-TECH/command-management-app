@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Gestion des caissiers</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("cashiers.create")}}" class="btn btn-dark">Ajouter</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Email</td>
                            <td>Profile</td>
                            <td>Date</td>
                            <td >Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cashiers as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <img src="{{ $item->url  }}" alt="" height="50" width="50">
                                </td>
                                <td>
                                    <span class="badge badge-primary">
                                       Creation : {{$item->created_at}}
                                    </span>
                                    <span class="badge badge-primary">
                                       Mise a jour :  {{$item->updated_at}}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{route("cashiers.destroy",$item)}}" method="post">
                                        <a href="{{route("cashiers.edit",$item)}}" class="btn btn-dark">
                                            Modifier
                                        </a>
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
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
