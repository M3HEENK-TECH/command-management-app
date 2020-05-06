@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-lg-8">
                <h2>Ventes</h2>
            </div>

            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Champ1</td>
                        <td>Champ2</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach([] as $item)
                        <tr>
                           <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


@endsection
