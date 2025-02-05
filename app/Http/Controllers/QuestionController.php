<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     $question=Question::all();
    //     return view('admin.question.index',compact('question'));
    // }
    public function index()
{
    $user = Auth::user(); // Récupère l'utilisateur connecté

    // Vérifie le rôle de l'utilisateur
    if ($user->role->name === 'Administrateurs') {
        // L'utilisateur est un administrateur, récupère toutes les questions
        $question = Question::all();
    } else {
        // L'utilisateur n'est pas un administrateur, filtre les questions par utilisateur
        $question = Question::whereHas('quiz', function ($query) use ($user) {
            $query->whereHas('formation', function ($subQuery) use ($user) {
                $subQuery->where('user_id', $user->id);
            });
        })->get();
    }

    return view('admin.question.index', compact('question'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz=Quiz::where('chapitre_id',$id)->get();
        return view('admin.question.create',compact('quiz'));
    }
    public function creates()
    {
        $quiz=Quiz::all();
        return view('admin.question.create',compact('quiz'));
    }
    public function createe($id)
    {
        $quiz=Quiz::where('id',$id)->get();
        return view('admin.question.create',compact('quiz'));
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
            'quiz_id' => 'nullable|exists:quizzes,id',
        ]);
        $question=Question ::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
       $quiz= Quiz::where('id',$id)->first();
       $question= Question::where('quiz_id',$id)->get();
       $quizID=$id;
        return view('admin.question.show', compact('question','quizID','quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, $id)
    {
        $question= Question::findOrfail($id);
        $quiz=Quiz::all();
        return view('admin.question.edit', compact('question','quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'quiz_id' => 'nullable|exists:quizzes,id',
        ]);
        $question= Question::findOrfail($id);
        $question->update($validatedData);
        return redirect('/formations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, $id)

    {
        $question = Question::findOrfail($id);
        $question->delete();

        return back();
    }
}
