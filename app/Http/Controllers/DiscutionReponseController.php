<?php

namespace App\Http\Controllers;

use App\Models\DiscutionReponse;
use Illuminate\Http\Request;

class DiscutionReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discutionReponse=DiscutionReponse::all();
        return view('',compact('discutionReponse'));
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
            'titre' => 'required|max:255',
            'content' => 'nullable',
            'discution_id' => 'nullable|exists:discutions,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $discution = DiscutionReponse::create($validatedData);

        return redirect('/discussions-reponses')->with('success', 'Discussions Réponse créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscutionReponse  $discutionReponse
     * @return \Illuminate\Http\Response
     */
    public function show(DiscutionReponse $discutionReponse)
    {
        return view('', compact('discutionReponse'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiscutionReponse  $discutionReponse
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscutionReponse $discutionReponse)
    {
        return view('', compact('discutionReponse'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiscutionReponse  $discutionReponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscutionReponse $discutionReponse)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'content' => 'nullable',
            'discution_id' => 'nullable|exists:discutions,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $discutionReponse->update($validatedData);
        return redirect('/discussions-reponses')->with('success', 'Discussions Réponse  mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscutionReponse  $discutionReponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscutionReponse $discutionReponse)
    {
        $discutionReponse->delete();

        return redirect('/discussions-reponses')->with('success', 'Discussions Réponse supprimée avec succès!');
    }
}
