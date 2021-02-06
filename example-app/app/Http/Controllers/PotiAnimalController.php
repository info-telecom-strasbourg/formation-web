<?php

namespace App\Http\Controllers;

use App\Models\PotiAnimal;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function show(PotiAnimal $potiAnimal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotiAnimal  $potiAnimal
     * @return \Illuminate\Http\Response
     */
    public function edit(PotiAnimal $potiAnimal)
    {
        //
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
