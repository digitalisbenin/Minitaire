<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\VisioConference;
use Illuminate\Http\Request;

class VisioConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conference=VisioConference::all();
        return view('admin.conference.index',compact('conference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conference.create');
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
            'lien_meet' => 'required|max:255',
            'date' => 'required|max:255',
            'debut' => 'required|max:255',
            'fin' => 'required|max:255',
            
        ]);
        //$formation = Formation::create($validatedData);
        $conference = new VisioConference();

        $conference->titre = $request->titre;
        $conference->date = $request->date;
        $conference->debut = $request->debut;
        $conference->fin = $request->fin;
        $conference->lien_meet = $request->lien_meet;
        $conference->user_id= Auth::id();
        $conference->save(); 
        return redirect('/visio-conferences')->with('success', 'Réunions créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function show(VisioConference $visioConference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $conference = VisioConference::findOrFail($id);
        return view('admin.conference.edit',compact('conference')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'lien_meet' => 'required|max:255',
            'date' => 'required|max:255',
            'debut' => 'required|max:255',
            'fin' => 'required|max:255',
            
        ]);
        //$formation = Formation::create($validatedData);
        $conference = VisioConference::findOrFail($id);

        $conference->titre = $request->titre;
        $conference->date = $request->date;
        $conference->lien_meet = $request->lien_meet;
        $conference->debut = $request->debut;
        $conference->fin = $request->fin;
        $conference->user_id= Auth::id();
        $conference->save();

        return redirect('/visio-conferences')->with('success', 'Réunions mise à jour  avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisioConference  $visioConference
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $conference = VisioConference::findOrfail($id);
        $conference->delete();
        
        return redirect('/visio-conferences')->with('success', 'Visio Conférence supprimée avec succès!');
    }
}
