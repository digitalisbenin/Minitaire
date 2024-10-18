<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $question=Question::all();
        return view('admin.question.index',compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz=Quiz::all();
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

        return redirect('/questions')->with('success', 'Question créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('', compact('question'));
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
        return redirect('/questions')->with('success', 'Question mise à jour avec succès!');
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

        return redirect('/questions')->with('success', 'Questions supprimée avec succès!');
    }
}
