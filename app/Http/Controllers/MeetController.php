<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\VisioConference;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meet=Meet::all();
        return view('admin.meet.index',compact('meet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $conference=VisioConference::all();
        return view('admin.meet.create',compact('users','conference'));
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
           
            'visio_conferences_id' => 'required|exists:visio_conferences,id',
            'user_id' => 'required|exists:users,id',
        ]);
        //$formation = Formation::create($validatedData);
        $meet = new Meet();
        $meet->visio_conferences_id = $request->visio_conferences_id;
        $meet->user_id=$request->user_id ;
        $meet->save();
        return redirect('/meets')->with('success', ' Le participant à été bien ajouter !'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet $meet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

        $conference = Meet::findOrfail($id);
        $conference->delete();
        
        return redirect('meets')->with('success', 'Particitant supprimée avec succès!'); 
    }
}
