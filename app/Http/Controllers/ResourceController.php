<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource=Resource::all();
        return view('',compact('resource'));
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
            'description' => 'required|max:255',
            'image_url' => 'required|max:255',
            'video_url' => 'required|max:255',
            'document_url' => 'required|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $formation = Resource::create($validatedData);

        return redirect('/resources')->with('success', 'Resources créée avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('',compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('',compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|max:255',
            'image_url' => 'required|max:255',
            'video_url' => 'required|max:255',
            'document_url' => 'required|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $resource->update($validatedData);
        return redirect('/resources')->with('success', 'Resource mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect('/resources')->with('success', 'Resources supprimée avec succès!');
    }
}
