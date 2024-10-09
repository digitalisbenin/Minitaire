<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\MesCour;
use App\Models\Formation;
use Illuminate\Http\Request;

class MesCourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesCours=MesCour::where('user_id', Auth::id())->get();
        $mesCourIds = $mesCours->pluck('formation_id');
    $mesCour = Formation::whereIn('id', $mesCourIds)->get(); 
    
     
        return view('mescours',compact('mesCour'));
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
        // $validatedData = $request->validate([
        //     'formation_id' => 'required|exists:formations,id',
        //     'user_id' => 'nullable|exists:users,id',
        // ]);
        // $mesCour = MesCour::create($validatedData);

        // return redirect('/mes-cours')->with('success', 'Formation ajouté a mes cours avec succès!');
        $formations_id = $request->input('formation_id');
       
        $user_id = Auth::id();



        if (Auth::check()) {


            $formation_check = Formation::find($formations_id);

            if ($formation_check) {
                if (MesCour::where('formation_id', $formations_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status'=> $formation_check->titre . " déjà ajouté à mes cours"],200);
                } else {
                    $mesCour= new MesCour();
                    $mesCour->formation_id = $formations_id;
                    $mesCour->user_id = Auth::id();
                    

                    $mesCour->save();

                    return response()->json(['status'=> $formation_check->titre . " ajouté à mes cours"] ,201);
                }
            }    

        } else {
            return response()->json(['status'=>"Connectez-vous pour ajouter ce cours"]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function show(MesCour $mesCour)
    {
        return view('', compact('mesCour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function edit(MesCour $mesCour)
    {
        return view('', compact('mesCour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesCour $mesCour)
    {
        $validatedData = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $mesCour->update($validatedData);
        return redirect('/mes-cours')->with('success', 'Formation  mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesCour  $mesCour
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesCour $mesCour)
    {
        $mesCour->delete();

        return redirect('/mes-cours')->with('success', 'Formation  supprimée avec succès!');
    }
}
