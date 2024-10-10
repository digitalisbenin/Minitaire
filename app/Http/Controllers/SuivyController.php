<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Suivy;
use App\Models\Chapitre;
use Illuminate\Http\Request;

class SuivyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suivy=Suivy::all();
        return view('admin.suivi', compact('suivy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapitres_id = $request->input('chapitreId');
        $taux = $request->input('taux');
        $user_id = Auth::id();



        if (Auth::check()) {


            $suivy_check = Chapitre::find($chapitres_id);

            if ($suivy_check) {
                if (Suivy::where('chapitre_id', $chapitres_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status'=> $suivy_check->titre . " déjà ajouté à ma progression"],200);
                } else {
                    $suivy= new Suivy();
                    $suivy->chapitre_id = $chapitres_id;
                    $suivy->user_id = Auth::id();
                    $suivy->tauxprogression = $taux;
        
                    $suivy->save();

                    return response()->json(['status'=> $suivy_check->titre . "ajouter avec success "] ,201);
                }
            }  


        } else {
            return response()->json(['status'=>"Connectez-vous pour ajouter votre progression"]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suivy  $suivy
     * @return \Illuminate\Http\Response
     */
    public function show(Suivy $suivy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suivy  $suivy
     * @return \Illuminate\Http\Response
     */
    public function edit(Suivy $suivy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suivy  $suivy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suivy $suivy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suivy  $suivy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suivy $suivy)
    {
        //
    }
}
