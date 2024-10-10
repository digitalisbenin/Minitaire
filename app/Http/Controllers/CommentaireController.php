<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire=Commentaire::all();
        return view('admin.commentaire',compact('commentaire'));
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
        //dd($request);
        $validatedData = $request->validate([
            'content' => 'required|max:255',
            'chapitre_id' => 'nullable|exists:chapitres,id',
            'user_id' => 'nullable|exists:users,id',

        ]);
       
        $commentaire= new Commentaire();
       
        
        $commentaire->content = $request->content;
        $commentaire->chapitre_id = $request->chapitre_id;
        $commentaire->user_id= Auth::id();
        $commentaire->save();

        return redirect('/formation')->with('success', 'Commentaire envoyer avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return view('', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        return view('', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:255',
            'chapitre_id' => 'nullabe|exists:chapitres,id',
            'user_id' => 'nullable|exists:users,id',

        ]);
        $commentaire->update($validatedData);
        return redirect('/certificates')->with('success', 'Commentaire mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect('/certificates')->with('success', 'Chapitre supprimée avec succès!');
    }
}
