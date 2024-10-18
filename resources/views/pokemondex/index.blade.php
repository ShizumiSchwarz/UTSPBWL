@extends('layouts.app')

@section('content')
    <div class="container">
        <main>

            <a class="btn btn-primary" href="{{ route('pokemondex.create') }}">Add New</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Primary Type</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>HP</th>
                        <th>Attack</th>
                        <th>Defense</th>
                        <th>Legendary</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pokemondex as $pokedex)
                        <tr>
                            <td>{{ $pokedex->id }}</td>
                            <td>
                                <img src="{{ Storage::url($pokedex->photo) }}" class="img-thumbnail w-50">
                            </td>
                            <td>
                                <a href="{{ route('pokemondex.show', $pokedex) }}">
                                    {{ $pokedex->name }}
                                </a>
                            </td>
                            <td>{{ $pokedex->species }}</td>
                            <td>{{ $pokedex->primary_type }}</td>
                            <td>{{ $pokedex->weight }}</td>
                            <td>{{ $pokedex->height }}</td>
                            <td>{{ $pokedex->hp }}</td>
                            <td>{{ $pokedex->attack }}</td>
                            <td>{{ $pokedex->defense }}</td>
                            <td>{{ $pokedex->is_legendary }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-warning" href="{{ route('pokemondex.edit', $pokedex) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('pokemondex.destroy', $pokedex) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $pokemondex->links() }}
        </main>
    </div>
@endsection
