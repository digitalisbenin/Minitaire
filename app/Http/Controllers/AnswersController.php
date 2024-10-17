<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers=Answers::all();
        return view('admin.answers.index',compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz=Question::all();
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

        return redirect('/answers')->with('success', 'Réponse créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show(Answers $answers)
    {
        return view('', compact('answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Answers $answers)
    {
        return view('', compact('answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answers $answers)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'is_correct' => 'nullable',
            'question_id' => 'required|exists:questions,id',
        ]);
        $answers->update($validatedData);
        return redirect('/answers')->with('success', 'Réponse mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answers $answers)
    {
        $answers->delete();

        return redirect('/answers')->with('success', 'Réponse supprimée avec succès!');
    }
}
