@php($products  = \App\Models\Product::notifications())
<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
        <form role="search" class="navbar-form-custom" action="search_results.html">
            <div class="form-group">
                <input type="text" placeholder="Recherche..." class="form-control" name="top-search" id="top-search">
            </div>
        </form>
    </div>
    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i> <span class="label label-success">
                    {{ $products->count()  }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                @foreach($products as $product)
                    <li>
                        <a>
                            <div><b> {{ $product->name  }} </b>  {{ $product->quantity  }}  </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>


        <li>
            <a href="{{ route('logout') }}">
                @csrf
                <i class="fa fa-sign-out"></i> Déconnexion
            </a>
        </li>
    </ul>

</nav>
