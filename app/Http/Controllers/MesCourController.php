<?php

namespace App\Http\Controllers;

use App\Models\MesCour;
use Illuminate\Http\Request;

class MesCourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesCour=MesCour::all();
        return view('',compact('mesCour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
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
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $mesCour = MesCour::create($validatedData);

        return redirect('/mes-cours')->with('success', 'Formation ajouté a mes cours avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function show(MesCour $mesCour)
    {
        return view('', compact('mesCour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function edit(MesCour $mesCour)
    {
        return view('', compact('mesCour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesCour $mesCour)
    {
        $validatedData = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $mesCour->update($validatedData);
        return redirect('/mes-cours')->with('success', 'Formation  mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesCour $mesCour)
    {
        $mesCour->delete();

        return redirect('/mes-cours')->with('success', 'Formation  supprimée avec succès!');
    }
}
