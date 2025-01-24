<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $answers=Answers::all();
    //     return view('admin.answers.index',compact('answers'));
    // }
    public function index()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role->name === 'Administrateurs') {
            // L'utilisateur est un administrateur, récupère toutes les réponses
            $answers = Answers::all();
        } else {
            // L'utilisateur n'est pas un administrateur, filtre les réponses par utilisateur
            $answers = Answers::whereHas('question.quiz', function ($query) use ($user) {
                $query->whereHas('formation', function ($subQuery) use ($user) {
                    $subQuery->where('user_id', $user->id);
                });
            })->get();
        }

        return view('admin.answers.index', compact('answers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates($id)
    {
        $quiz= Question::whereHas('quiz', function ($query) use ($id) {
            $query->where('formation_id', $id);
        })->get();
        $formationId=$id;
        return view('admin.answers.create',compact('quiz','formationId'));
    }
    public function createe($id)
    {
        $quiz= Question::where('quiz_id',$id)->get();
        $formationId=$id;
        return view('admin.answers.create',compact('quiz','formationId'));
    }
    public function create()
    {
        $quiz= Question::all();
        
        return view('admin.answers.create',compact('quiz'));
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
            'title' => 'required|max:255',
            'is_correct' => 'nullable',
            'question_id' => 'required|exists:questions,id',
        ]);
        $answers=Answers ::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::where('id',$id)->first();
        $answers = Answers::where('question_id',$id)->get();
        $questionID=$id;
        return view('admin.answers.show', compact('answers','questionID','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Answers $answers, $id)
    {
        $question=Question::all();
        $answers= Answers::findOrfail($id);
        return view('admin.answers.edit', compact('answers','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answers $answers, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'is_correct' => 'nullable',
            'question_id' => 'nullable|exists:questions,id',
        ]);
        $answers= Answers::findOrfail($id);
        $answers->update($validatedData);
        return redirect('/formations');
        //return redirect('/questions/' . $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answers $answers, $id)
    {
        $answers = Answers::findOrfail($id);
        $answers->delete();

        return back();
    }
}
