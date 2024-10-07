<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapitre=Chapitre::all();
        return view('admin.chapitre.index',compact('chapitre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formation=Formation::all();
        return view('admin.chapitre.create',compact('formation'));
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
            'description' => 'nullable',
            'image_url' => 'nullable',
            'video_url' => 'nullable',
            'document_url' => 'nullable',
            'formation_id' => 'required|exists:formations,id',

        ]);
        //$chapitre = Chapitre::create($validatedData);
        $chapitre = new Chapitre();

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_images',$filename);
            $chapitre->image_url = $filename;
        }
        if ($request->hasFile('document_url')) {
            $file = $request->file('document_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_documents',$filename);
            $chapitre->document_url = $filename;
        }
        if ($request->hasFile('video_url')) {
            $file = $request->file('video_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_video',$filename);
            $chapitre->video_url = $filename;
        }
        
        $chapitre->titre = $request->titre;
        $chapitre->description = $request->description;
        $chapitre->formation_id = $request->formation_id;
        $chapitre->save();

        return redirect('/chapitres')->with('success', 'Chapitre créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        return view('', compact('chapitre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $chapitre= Chapitre::findOrfail($id);
        $formation=Formation::all();
        return view('admin.chapitre.edit', compact('chapitre','formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)

    {
      
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'image_url' => 'nullable',
            'video_url' => 'nullable',
            'document_url' => 'nullable',
            'formation_id' => 'required|exists:formations,id',
        ]);
        
        $chapitre = Chapitre::findOrfail($id);
    

        if ($request->hasFile('image_url')) {
            $path='assets/uploads/chapitre_images'.$chapitre->image_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('image_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_images',$filename);
            $chapitre->image_url= $filename;
        }

        if ($request->hasFile('document_url')) {
            $path='assets/uploads/chapitre_documents'.$chapitre->document_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('document_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_documents',$filename);
            $chapitre->document_url= $filename;
        }

        if ($request->hasFile('video_url')) {
            $path='assets/uploads/chapitre_video'.$chapitre->video_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('video_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapitre_video',$filename);
            $chapitre->video_url= $filename;
        }
       


        $chapitre->titre = $request->titre;
        $chapitre->description = $request->description;
        $chapitre->formation_id = $request->formation_id;
        $chapitre->save();
        return redirect('/chapitres')->with('success', 'Chapitre mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapitre $chapitre, $id)
    {
      $chapitr = Chapitre::findOrfail($id);
        $chapitr->delete();
        session()->flash('success', 'Suppression du chapitre réussie !');
       
        return redirect('/chapitres')->with('success', 'Chapitre supprimée avec succès!');
    }
}
