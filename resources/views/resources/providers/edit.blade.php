@extends('layouts.admin')

@section('content')

<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un Fournisseur</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('providers.update', $provider->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="field">
                    <label class="label">Nom </label>
                    <div class="control">
                      <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $provider->name) }}" placeholder="Nouveau Nom du Fournisseur">
                    </div>
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                    <div class="field">
                        <div class="control">
                        <button class="button is-link">Modifier</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection