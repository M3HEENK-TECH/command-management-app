@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-10">
        <h2>Ventes de caissiers</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

<<<<<<< Updated upstream
            <div class="col-lg-6 text-right">
                <div class="nav-item dropdown ">
                    <a id="cashier_print" class="btn btn-dark dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Imprimer les ventes de :</a>
                    <div aria-labelledby="cashier_print" class="bg-dark dropdown-menu dropdown-menu-right">
                            @foreach($cashiers as $cashier)
                                <a class="dropdown-item bg-dark text-white" href="{{route("app_sales.index")}}">
                                    {{ $cashier->name  }} </a>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Casissier</td>
                        <td>Date</td>
                        <td>Produit</td>
                        <td>Quantité</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td> {{$sale->cashier->name}} </td>
                            <td>{{$sale->created_at->diffForHumans()}} </td>
                            <td>
                                {{$sale->product->name}}
                                <b>{{$sale->product->quantity}} {{$sale->product->unity}}</b> actuellement
                            </td>
                            <td>{{$sale->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="col-lg-12">
        {{ $sales->links()  }}
    </div>
=======
                    <h5>Liste des ventes des caissiers</h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Caissier</th>
                                        <th>Date</th>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($sales as $key=> $sale)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td> {{$sale->cashier->name}} </td>
                                            <td>{{$sale->created_at->diffForHumans()}} </td>
                                            <td>
                                                {{$sale->product->name}}
                                                <b>{{$sale->product->quantity}} {{$sale->product->unity}}</b> actuellement
                                            </td>
                                            <td>{{$sale->quantity}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> Stashed changes

@endsection
