@include("partials.head")
<body>
<<<<<<< Updated upstream

<div id="wrapper">
    @include("partials.nav")

    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            @include("partials.header")
        </div>
=======
 
    <div id="wrapper">
        @include("partials.nav")

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                @include("partials.header")
            </div>
>>>>>>> Stashed changes

            @include("partials.alerts")

<<<<<<< Updated upstream
        <div class="wrapper wrapper-content">

            <div class="row">
                @yield('content')
=======
            <div class="wrapper wrapper-content">

            <div class="row">

                @yield('content')
                
>>>>>>> Stashed changes
            </div>
        </div>

        <div class="row">
            @include("partials.footer")
        </div>
    </div>

    <!-- Mainly scripts -->
<<<<<<< Updated upstream
@include("partials.footer-script")
=======
    @include("partials.footer-script")
>>>>>>> Stashed changes
</body>
</html>
