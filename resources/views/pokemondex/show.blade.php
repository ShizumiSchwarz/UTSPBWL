@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $pokedex->name }}</h1>
            <p>
                {{ $pokedex->primary_type }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>Species</b></td>
                        <td>{{ $pokedex->species }}</td>
                    </tr>
                    <tr>
                        <td><b>Weight</b></td>
                        <td>{{ $pokedex->weight }}</td>
                    </tr>
                    <tr>
                        <td><b>Height</b></td>
                        <td>{{ $pokedex->height }}</td>
                    </tr>
                    <tr>
                        <td><b>HP</b></td>
                        <td>{{ $pokedex->hp }}</td>
                    </tr>
                    <tr>
                        <td><b>Attack</b></td>
                        <td>{{ $pokedex->attack }}</td>
                    </tr>
                    <tr>
                        <td><b>Defense</b></td>
                        <td>{{ $pokedex->defense }}</td>
                    </tr>
                    <tr>
                        <td><b>Legendary</b></td>
                        <td>{{ $pokedex->is_legendary }}</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection
