@include("partials.head")


<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="text-left">
            @include("partials.alerts")
        </div>
        <div>
            <div>

                <h1 class="logo-name">JK</h1>

            </div>
            <h3>Bienvenue</h3>

            <p>Remplissez les champs et connectez-vous</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Login" required="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Connexion</button>

            </form>
            <p class="m-t"> <small>M3HEENK-TECH &copy; <script>document.write(new Date().getFullYear());</script></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    @include("partials.footer-script")

</body>

</html>
