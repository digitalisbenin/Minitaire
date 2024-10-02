<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluation=Evaluation::all();
        return view('',compact('evaluation'));
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
            'evaluation' => 'required|max:255',
            'nameProf' => 'required|max:255',
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $evaluation = Evaluation::create($validatedData);

        return redirect('/evaluations')->with('success', 'Evaluations créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        return view('', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        return view('', compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $validatedData = $request->validate([
            'evaluation' => 'required|max:255',
            'nameProf' => 'required|max:255',
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $evaluation->update($validatedData);
        return redirect('/evaluations')->with('success', 'Evaluations mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return redirect('/evaluations')->with('success', 'Evaluations supprimée avec succès!');
    }
}
