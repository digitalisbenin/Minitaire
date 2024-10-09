<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video=Video::all();
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.video.create');
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
            'video_url' => 'required',
            
           
        ]);
       
        $video= new Video();
        if ($request->hasFile('video_url')) {
            $file = $request->file('video_url');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/video_video',$filename);
            $video->video_url = $filename;
        }
        
        $video->titre = $request->titre;
        $video->description = $request->description;
        $video->user_id= Auth::id();
        $video->save();

        return redirect('/videos')->with('success', 'Videos créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $video = Video::findOrfail($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'video_url' => 'nullable',
        ]);
        
        $video = Video::findOrfail($id);
    

       

        if ($request->hasFile('video_url')) {
            $path='assets/uploads/video_video'.$video->video_url;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('video_url');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/video_video',$filename);
            $video->video_url= $filename;
        }
       


        $video->titre = $request->titre;
        $video->description = $request->description;
        $video->save();
        return redirect('/videos')->with('success', 'Video mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video,$id)
    {
        $videos = Video::findOrfail($id);
        $videos->delete();
        return redirect('/videos')->with('success', 'Video supprimée avec succès!');
    }
}
