<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        return view('admin.ressource.index',compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ressource.create');
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
            'image_url' => 'required',
            'video_url' => 'required',
            'document_url' => 'required',
           
        ]);
       
        $resource = new Resource();

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_images',$filename);
            $resource->image_url = $filename;
        }
        if ($request->hasFile('document_url')) {
            $file = $request->file('document_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_documents',$filename);
            $resource->document_url = $filename;
        }
        if ($request->hasFile('video_url')) {
            $file = $request->file('video_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_video',$filename);
            $resource->video_url = $filename;
        }
        
        $resource->titre = $request->titre;
        $resource->description = $request->description;
        $resource->user_id= Auth::id();
        $resource->save();

        return redirect('/ressources')->with('success', 'Resources créée avec succès!');

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
    public function edit( $id)
    {
        $resource=Resource::findOrfail($id);
    
        return view('admin.ressource.edit',compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|max:255',
            'image_url' => 'nullable|max:255',
            'video_url' => 'nullable|max:255',
            'document_url' => 'nullable|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);
      
        $resource = Resource::findOrfail($id);
    

        if ($request->hasFile('image_url')) {
            $path='assets/uploads/resource_images'.$resource->image_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('image_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_images',$filename);
            $resource->image_url= $filename;
        }

        if ($request->hasFile('document_url')) {
            $path='assets/uploads/resource_documents'.$resource->document_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('document_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_documents',$filename);
            $resource->document_url= $filename;
        }

        if ($request->hasFile('video_url')) {
            $path='assets/uploads/resource_video'.$resource->video_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('video_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resource_video',$filename);
            $resource->video_url= $filename;
        }
       


        $resource->titre = $request->titre;
        $resource->description = $request->description;
       
        $resource->save();
        return redirect('/ressources')->with('success', 'Resource mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource, $id)
    {
        $resoures = Resource::findOrfail($id);
        $resoures->delete();
        return redirect('/ressources')->with('success', 'Resources supprimée avec succès!');
    }
}
