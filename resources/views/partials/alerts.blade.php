<style>
    .alert__message{
        font-size: 20px;
    }
</style>

@if(Session::has('success'))
    <div class="alert__message col-lg-12 alert alert-success ">{{Session::get('success')}}</div>
@endif

@if(Session::has('danger'))
    <div class="alert__message col-lg-12 alert alert-success ">{{ Session::get('danger')  }}</div>
@endif

@if($errors->any())
    <div class="alert__message col-lg-12 alert alert-danger ">
        <p>Erreur(s) rencontrer : </p>
        <ul>
            @foreach($errors->all() as $error) <li> {{$error}} </li> @endforeach
        </ul>
    </div>
@endif

