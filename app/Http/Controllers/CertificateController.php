<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
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

        return redirect('/certificates');
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
        return redirect('/certificates');
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

        return redirect('/certificates');
    }
    public function download($chapterId)
    {
        $user = Auth::user();
        // $certificate = Certificate::where('user_id', $user->id)
        //     ->where('formation_id', $chapterId)
        //     ->first();
        $certificate = Certificate::where('user_id', $user->id)
    ->where('formation_id', $chapterId)
    ->orderBy('created_at', 'desc')
    ->first();

        if (!$certificate) {
            return redirect()->back()->with('error', 'Certificat non disponible.');
        }

        $chapter = Formation::find($chapterId);

        $data = [
            'user' => $user,
            'chapter' => $chapter,
            'certificate' => $certificate,
        ];

        $pdf = PDF::loadView('certificate.pdf', $data);

        return $pdf->download('certificate.pdf');
    }

}
