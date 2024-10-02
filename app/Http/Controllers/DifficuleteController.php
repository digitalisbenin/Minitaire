<?php

namespace App\Http\Controllers;

use App\Models\Difficulete;
use Illuminate\Http\Request;

class DifficuleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $difficulete=Difficulete::all();
        return view('',compact('difficulete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
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
           'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $commentaire = Difficulete::create($validatedData);

        return redirect('/difficultes')->with('success', 'Difficultés créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Difficulete  $difficulete
     * @return \Illuminate\Http\Response
     */
    public function show(Difficulete $difficulete)
    {
        return view('', compact('difficulete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Difficulete  $difficulete
     * @return \Illuminate\Http\Response
     */
    public function edit(Difficulete $difficulete)
    {
        return view('', compact('difficulete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Difficulete  $difficulete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Difficulete $difficulete)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
             'description' => 'nullable',
         ]);
         $difficulete->update($validatedData);
         return redirect('/difficultes')->with('success', 'Difficulté mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Difficulete  $difficulete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Difficulete $difficulete)
    {
        $difficulete->delete();

        return redirect('/difficultes')->with('success', 'Difficulté supprimée avec succès!');
    }
}
