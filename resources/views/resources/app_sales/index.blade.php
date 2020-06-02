@extends('layouts.app')

@section('content')

<div class="col-lg-6">
    @if ( !empty($cashier) )
        <h2>Ventes de {{$cashier->name}} </h2>
    @else
        <h2>Ventes de caissiers</h2>
    @endif

</div>

<div class="col-lg-6 text-right">
    {{--
    @if ( !empty($cashiers) )

        <div class="dropdown" style="display: inline-block" >
            <a id="cashier_sales" class="btn btn-primary dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Voir les ventes de </a>
            <ul aria-labelledby="cashier_sales" class="dropdown-menu dropdown-menu-right">
                @foreach($cashiers as $cashier)
                    <li>
                        <a class="" href="{{route("app_sales.index",['user_id'=> $cashier->id ])}}">
                            {{ $cashier->name  }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


        <div class="dropdown" style="display: inline-block" >
            <a id="cashier_print" class="btn btn-primary dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Imprimer les ventes de </a>
            <ul aria-labelledby="cashier_print" class="dropdown-menu dropdown-menu-right">
                @foreach($cashiers as $cashier)
                    <li>
                        <a class="" href="{{route("app_sales.print",['cashier'=> $cashier->id ])}}">
                            {{ $cashier->name  }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    @else
        <div class="dropdown ">
            <a class="btn btn-primary" href="{{route("app_sales.print",['cashier'=> auth()->user()->id ])}}" >
                Imprimer mes ventes </a>

        </div>
    @endif
    --}}

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Liste des ventes des caissiers</h5>

<<<<<<< Updated upstream
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
=======
                        <<<<<<< Updated upstream
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Imprimer par date
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insere votre date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('print_date') }}" method="get">
                                            @csrf
                                            <label for="Date">Entrez une date</label>
                                            <input type="date" class="form-control" name="date">
                                            <label for="cashier">Cashier</label>
                                            <select name="cashier_id">
                                                @foreach($cashiers as $cashier)
                                                <option value="{{$cashier->id}}">{{$cashier->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
>>>>>>> Stashed changes

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

@endsection
