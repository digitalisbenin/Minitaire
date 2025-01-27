<?php

namespace App\Http\Controllers;
use App\Models\Notequiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotequizControleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notequiz=Notequiz::all();
        return view('',compact('notequiz'));

    }

    public function indexe()
    {

        $notequiz= Notequiz::where('user_id', Auth::id())->get();
        return view('recapulative',compact('notequiz'));
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
        $formations_id = $request->input('formation_id');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
