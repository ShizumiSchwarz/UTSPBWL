@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pokemondex.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="species">Species</label>
                        <textarea class="form-control @error('v') is-invalid @enderror" name="species" id="species"
                            rows="3">{{ old('species') }}</textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="primary_type">Primary Type</label>
                        <select class="form-select @error('primary_type') is-invalid @enderror" aria-label="Pokemon Primary Type">
                            <option selected>Grass</option>
                            <option value="1">Fire</option>
                            <option value="2">Water</option>
                            <option value="3">Bug</option>
                            <option value="4">Normal</option>
                            <option value="5">Poison</option>
                            <option value="6">Electric</option>
                            <option value="7">Ground</option>
                            <option value="8">Fairy</option>
                            <option value="9">Fighting</option>
                            <option value="10">Psychic</option>
                            <option value="11">Rock</option>
                            <option value="12">Ghost</option>
                            <option value="13">Ice</option>
                            <option value="14">Dragon</option>
                            <option value="15">Dark</option>
                            <option value="16">Steel</option>
                            <option value="17">Flying</option>
                          </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="weight">Weight</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="number"
                            name="weight" id="weight" value="{{ old('weight') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="height">Height</label>
                        <input class="form-control @error('height') is-invalid @enderror" type="number"
                            name="height" id="height" value="{{ old('height') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="hp">HP</label>
                        <input class="form-control @error('hp') is-invalid @enderror" type="number" name="hp"
                            id="hp" value="{{ old('hp') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="attack">Attack</label>
                        <input class="form-control @error('attack') is-invalid @enderror" type="number" name="attack"
                            id="attack" value="{{ old('attack') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="defense">Defense</label>
                        <input class="form-control @error('defense') is-invalid @enderror" type="number" name="defense"
                            id="defense" value="{{ old('defense') }}">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('is_legendary') is-invalid @enderror" type="radio" name="is_legendary" id="is_legendary1">
                        <label class="form-check-label" for="is_legendary1">
                          Legendary
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error('is_legendary') is-invalid @enderror" type="radio" name="is_legendary" id="is_legendary2" checked>
                        <label class="form-check-label" for="is_legendary2">
                          Not Legendary
                        </label>
                      </div>
                    <div class="col-6">
                        <label class="form-label" for="photo">Photo</label>
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo"
                            id="photo" value="{{ old('photo') }}">
                            <img src="{{ Storage::url($product->photo) }}" class="img-fluid">
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Update</button>
                </div>
            </form>
        </main>
    </div>
@endsection
