<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Formation;
use App\Models\Difficulete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formation=Formation::all();
        return view('admin.cours.index',compact('formation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie=Category::all();
        $difficulte=Difficulete::all();
        return view('admin.cours.create',compact('categorie','difficulte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|max:255',
            'image_url' => 'required|max:255',
             'status' => 'required|max:255',
            'categorie_id' => 'nullable|exists:categories,id',
            'difficulte_id' => 'nullable|exists:difficuletes,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        //$formation = Formation::create($validatedData);
        $formation = new Formation();

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/formation_images',$filename);
            $formation->image_url = $filename;
        }
        
        $formation->titre = $request->titre;
        $formation->description = $request->description;
        $formation->categorie_id = $request->categorie_id;
        $formation->difficulte_id = $request->difficulte_id;
        $formation->status = $request->status;
        $formation->user_id= Auth::id();
        $formation->save();

        session()->flash('success', 'La Formation à été bien créée !');
        
        
        return redirect('/formations')->with('success', 'Formations créée avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        return view('',compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $formation=Formation::findOrfail($id);
        $categorie=Category::all();
        $difficulte=Difficulete::all();
        return view('admin.cours.edit',compact('formation','categorie','difficulte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|max:255',
            'image_url' => 'nullable|max:255',
            'status' => 'required|max:255',
            'categorie_id' => 'nullable|exists:categories,id',
            'difficulte_id' => 'nullable|exists:difficuletes,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
       // $formation->update($validatedData);
        $formation = Formation::findOrfail($id);
    

        if ($request->hasFile('image_url')) {
            $path='assets/uploads/formation_images'.$formation->image_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('image_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/formation_images',$filename);
            $formation->image_url= $filename;
        }

        $formation->titre = $request->titre;
        $formation->description = $request->description;
        $formation->categorie_id = $request->categorie_id;
        $formation->difficulte_id = $request->difficulte_id;
        $formation->status = $request->status;
        //$formation->user_id= Auth::id();
        $formation->save();



        return redirect('/formations')->with('success', 'Formations mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $formation= Formation::findOrfail($id);
        $formation->delete();

        return redirect('/formations')->with('success', 'Formations supprimée avec succès!');
    }
}
