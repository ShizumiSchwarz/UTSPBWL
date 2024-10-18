<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemondex = Pokemon::paginate(20);
        return view('pokemondex.index', compact('pokemondex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemondex.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'decimal|min:2|max:8|default:0',
            'height' => 'decimal|min:2|max:8|default:0',
            'hp' => 'integer|default:0|max:4',
            'attack' => 'integer|default:0|max:4',
            'defense' => 'integer|default:0|max:4',
            'is_legendary' => 'required|boolean|default:false',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokedex = Pokemon::create($request->all());

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $pokedex->update([
                'photo' => $filePath
            ]);
        }

        return redirect()->route('pokemondex.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokedex)
    {
        return view('pokemondex.show', compact('pokedex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokedex)
    {
        return view('pokemondex.edit', compact('pokedex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokedex)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'decimal|min:2|max:8|default:0',
            'height' => 'decimal|min:2|max:8|default:0',
            'hp' => 'integer|default:0|max:4',
            'attack' => 'integer|default:0|max:4',
            'defense' => 'integer|default:0|max:4',
            'is_legendary' => 'required|boolean|default:false',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokedex = Pokemon::where('id', $pokedex->id);
        $pokedex->update($request->except(['_token', '_method']));

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $pokedex->update([
                'photo' => $filePath
            ]);
        }

        return redirect()->route('pokemondex.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokedex)
    {
        $pokedex->delete();
        return redirect()->route('pokemondex.index');
    }
}
