

@if(Session::has('success'))
    <div class=" col-lg-12 alert alert-success ">{{Session::get('success')}}</div>
@endif

@if(Session::has('danger'))
    <div class="col-lg-12 alert alert-success ">{{ Session::get('danger')  }}</div>
@endif

@if($errors->any())
    <div class="col-lg-12 alert alert-danger ">
        <p>Erreur(s) rencontrer : </p>
        <ul>
            @foreach($errors->all() as $error) <li> {{$error}} </li> @endforeach
        </ul>
    </div>
@endif

