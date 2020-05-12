@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Notification</h2>
            </div>
           
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notiproduct as $item)
                            <tr>
                                <p>Le Produit <em>{{$item->name}}</em> à atteint le Seuil Critique 
                             Quantité Restante :<strong style="color:red;"> {{$item->quantity}} </strong>
                          
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


@endsection