<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificate=Certificate::all();
        return view('',compact('certificate'));
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
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $certificate = Certificate::create($validatedData);

        return redirect('/certificates')->with('success', 'Certificate créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return view('', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validatedData = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $certificate->update($validatedData);
        return redirect('/certificates')->with('success', 'Certificate mise à jour avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect('/certificates')->with('success', 'Certificate supprimée avec succès!');
    }
}
