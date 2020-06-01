@include("partials.head")


<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            @include("partials.alerts")
        </div>
        <div>
            <b> <h2 style="font-size: 90px;">LOGIN</h2></b>
            <br>
            <h2>Bienvenue</h2>

            <p>Remplissez les champs et connectez-vous</p>
            <br>

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
