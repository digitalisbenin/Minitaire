<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapitre=Chapitre::all();
        return view('',compact('chapitre'));
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
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'image_url' => 'nullable',
            'video_url' => 'nullable',
            'document_url' => 'nullable',
            'formation_id' => 'required|exists:formations,id',

        ]);
        $chapitre = Chapitre::create($validatedData);

        return redirect('/chapitres')->with('success', 'Chapitre créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        return view('', compact('chapitre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapitre $chapitre)
    {
        return view('', compact('chapitre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapitre $chapitre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'image_url' => 'nullable',
            'video_url' => 'nullable',
            'document_url' => 'nullable',
            'formation_id' => 'required|exists:formations,id',
        ]);
        $chapitre->update($validatedData);
        return redirect('/certificates')->with('success', 'Chapitre mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapitre $chapitre)
    {
        $chapitre->delete();

        return redirect('/certificates')->with('success', 'Chapitre supprimée avec succès!');
    }
}
