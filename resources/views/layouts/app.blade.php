@include("partials.head")
<body>

<div id="wrapper">
    @include("partials.nav")

    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            @include("partials.header")
        </div>


        <div class="wrapper wrapper-content" >

            @include('partials.alerts')
            @yield('content')

        </div>

        <div class="row">
            @include("partials.footer")
        </div>

    </div>

    <!-- Mainly scripts -->
@include("partials.footer-script")
</body>
</html>
