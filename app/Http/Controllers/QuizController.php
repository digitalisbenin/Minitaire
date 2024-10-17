<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Formation;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz=Quiz::all();
        return view('admin.quiz.index',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formation=Formation::all();
        return view('admin.quiz.create',compact('formation'));
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
        //'title', 'description' ,'status'
        $validatedData = $request->validate([

            'title' => 'required|max:255',
            'status' => 'required',
            'description' => 'nullable',
            'formation_id' => 'required|exists:formations,id',
        ]);
        $quiz=Quiz ::create($validatedData);

        return redirect('/quizs')->with('success', 'Quiz créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)

    {
        $quiz= Quiz::findOrfail($id);
        $formation=Formation::all();
        return view('admin.quiz.edit', compact('quiz','formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $validatedData = $request->validate([

            'title' => 'required|max:255',
            'status' => 'required',
            'description' => 'nullable',
        ]);
        $quiz = Quiz::findOrfail($id);
        $quiz->update($validatedData);

        return redirect('/quizs')->with('success', 'Quiz mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect('/quizs')->with('success', 'Quiz supprimée avec succès!');
    }
}
