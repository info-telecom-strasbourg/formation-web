<?php

namespace App\Http\Controllers;

use App\Models\PotiAnimal;
use App\Models\PotiAnimauxType;
use Illuminate\Http\Request;

class PotiAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potiAnimals = PotiAnimal::all();
        return view('animals.index', compact('potiAnimals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = PotiAnimauxType::all();
        return view('animals.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'type' => 'required'
        ]);
        
        /*
            Parfois, une verification plus poussé sera nécessaire pour être
            sûr que les informations ne poseront pas de problème lors
            de l'appel à "create".
        */

        $potiAnimal = PotiAnimal::create($validatedData);

        // pour une route avec l'URI suivante : poti-animals/{poti_animal}
        return redirect()->route('poti-animals.show', ['poti_animal' => $potiAnimal]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function show(PotiAnimal $potiAnimal)
    {
        return view('animals.show', compact('potiAnimal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function edit(PotiAnimal $potiAnimal)
    {
        $types = PotiAnimauxType::all();
        return view('animals.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PotiAnimal $potiAnimal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function destroy(PotiAnimal $potiAnimal)
    {
        //
    }
}
