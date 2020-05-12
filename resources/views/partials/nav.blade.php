<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('assets/img/im.png') }}" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->name }}<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Profile</a></li>
                            <li class="divider"></li>                        
                            <li><a href="{{ route('logout') }}">Deconnexion</a></li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        CMD
                    </div>
                </li>
                
                @if( auth()->check() and auth()->user()->isAdmin() )

                    <li class="">
                        <a href="{{url('home/admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="{{route("cashiers.index")}}"><i class="fa fa-users"></i> <span class="nav-label">Caissiers</span></a>
                    </li>
                    <li class="">
                        <a href="{{route("products.index")}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Produits</span> </a>
                    </li>
                    <li>
                        <a href="{{route("providers.index")}}"><i class="fa fa-user-plus"></i> <span class="nav-label">Fournisseurs</span></a>
                    </li>
                    <li>
                        <a href="{{route("supplies.index")}}"><i class="fa fa-cart-arrow-down"></i> <span class="nav-label">Approvisionnement</span></a>
                    </li>
                    <li>
                        <a href="{{route("app_sales.index")}}"><i class="fa fa-line-chart"></i> <span class="nav-label">Ventes</span></a>
                    </li>

                @elseif(auth()->check() and  auth()->user()->isCashier() )

                    <li>
                        <a href="grid_options.html"><i class="fa fa-line-chart"></i> <span class="nav-label">Panier</span></a>
                    </li>
                    
                @endif
            </ul>

        </div>
    </nav>