@component('mail::message')

Les elements suivant sont en peignerie de stocks
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
