@component('mail::message')

Les élements suivant sont en pénurie de stocks
<br>
    <div>
        <ul>
            @foreach($data as $n)
              <li>  Nom :   {{ $n->name }} &nbsp;
               Quantite : {{ $n->quantity }}</li>
            @endforeach
        </ul>
    </div>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
