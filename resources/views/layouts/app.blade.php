@include("partials.head")
<body>

    <div id="wrapper">
        @include("partials.nav")

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                @include("partials.header")
            </div>

            @include("partials.alerts")

            <div class="wrapper wrapper-content">

            <div class="row">

<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <div class="col-md-3">
                    <div class="list-group">
                        @if( auth()->check() and auth()->user()->isAdmin() )
                            <a class="list-group-item" href="{{route("cashiers.index")}}">Caissiers</a>
                            <a class="list-group-item" href="{{route("products.index")}}">Produits</a>
                            <a class="list-group-item" href="{{route("providers.index")}}">Fournisseurs</a>
                            <a class="list-group-item" href="{{route("supplies.index")}}">Approvisionements</a>
                            <a class="list-group-item" href="{{route("sales.index")}}">Panier</a>
                            <a class="list-group-item" href="{{route("app_sales.index")}}">Ventes</a>
                            <a class="list-group-item" href="{{route("notification_list")}}">Notification</a>
                        @elseif(auth()->check() and  auth()->user()->isCashier() )
                            <a class="list-group-item" href="{{route("sales.index")}}">Panier</a>
                            <a class="list-group-item" href="{{route("app_sales.index")}}">Ventes</a>
                            <a class="list-group-item" href="{{route("notification_list")}}">Notification</a>
                        @endif
                    </div>
                </div>

                <div class="col-md-9">
                    @yield('content')
                </div>

=======
                @yield('content')

>>>>>>> Stashed changes
=======
                @yield('content')
                
>>>>>>> Stashed changes
            </div>
        </div>

        <div class="row">
            @include("partials.footer")
        </div>
    </div>

    <!-- Mainly scripts -->
    @include("partials.footer-script")
</body>
</html>
