<?php

namespace App\Http\Controllers;

use App\Models\Discution;
use Illuminate\Http\Request;

class DiscutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discution=Discution::all();
        return view('',compact('discution'));
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
            'titre' => 'required|max:255',
            'content' => 'nullable',
            'image_url' => 'required|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $discution = Discution::create($validatedData);

        return redirect('/discussions')->with('success', 'Discussions créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function show(Discution $discution)
    {
        return view('', compact('discution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function edit(Discution $discution)
    {
        return view('', compact('discution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discution $discution)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'content' => 'nullable',
            'image_url' => 'required|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $discution->update($validatedData);
        return redirect('/discussions')->with('success', 'Discussions mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discution $discution)
    {
        $discution->delete();

        return redirect('/discussions')->with('success', 'Discussions supprimée avec succès!');
    }
}
