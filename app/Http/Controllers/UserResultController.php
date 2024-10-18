<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserResult;
use Illuminate\Http\Request;

class UserResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexe()
    {
    
        $userResults= UserResult::where('user_id', Auth::id())->get();
        return view('userResult',compact('userResults'));
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
       
  // Tableau pour stocker les réponses liées aux questions
  $reponsesParQuestion = [];

  // Parcourir toutes les questions pour obtenir leurs réponses
  foreach ($request->input() as $key => $value) {
      // Vérifier si l'entrée correspond à un bouton radio d'une question
      if (strpos($key, 'reponse_') !== false) {
          // Extraire l'ID de la question à partir de la clé (par ex. 'reponse_1')
          $questionId = str_replace('reponse_', '', $key);

          // Ajouter la réponse sélectionnée au tableau
          $reponsesParQuestion[$questionId] = $value;
      }
  }

  //dd($reponsesParQuestion);

  // Exemple d'utilisation du tableau (affichage des réponses récupérées)
  foreach ($reponsesParQuestion as $questionId => $reponseId) {
      // Sauvegarder chaque réponse dans la base de données, ou traiter comme nécessaire
      UserResult::create([
        'question_id' => $questionId,
            'answers_id' => $reponseId,
        'user_id' => auth()->user()->id,
       
    ]);
  }

  return back()->with('success', 'Réponses enregistrées avec succès !');

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserResult  $userResult
     * @return \Illuminate\Http\Response
     */
    public function show(UserResult $userResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserResult  $userResult
     * @return \Illuminate\Http\Response
     */
    public function edit(UserResult $userResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserResult  $userResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserResult $userResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserResult  $userResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserResult $userResult)
    {
        //
    }
}
