@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Ventes</h2>
            </div>

            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Nom Caissier</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($caisses as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                           <td>
                            <a href="{{route("app_sales.store",["id"=>$item->id])}}" class="btn btn-dark">Consulté Ventes</a>
                           </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


@endsection
