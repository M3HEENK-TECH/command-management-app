@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Gestion des Fournisseurs</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route("providers.create")}}" class="btn btn-dark">Ajouter</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </thead>
                    <tbody>
                             @foreach($providers as $provider)
                        <tr @if($provider->deleted_at) class="has-background-grey-lighter" @endif>
                            <td><strong>{{ $provider->name }}</strong></td>

                                <td>
                                    @if($provider->deleted_at)
                                    @else
                                        <a class="button is-warning" href="{{ route('providers.edit', $provider->id) }}">Modifier</a>
                                    @endif
                                </td>
                            <td>
                                <form action="{{ route('providers.destroy', $provider->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
