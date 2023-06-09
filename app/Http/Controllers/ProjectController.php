<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.project', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Project::create([
            'bg' => $request->file('bg')->store('projectbg', 'public'),
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $request->file('photo')->store('projectphoto', 'public'),
            'video' => $request->video,
            'name' => $request->name,
            'nim' => $request->nim,
            'profile' => $request->file('profile')->store('projectprofile', 'public'),
            'ig' => $request->ig,
            'wa' => $request->wa,
            'qr' => $request->file('qr')->store('projectqr', 'public'),
            'highlight' => $request->highlight,
            'category_id' => $request->category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if($request->file('bg')) {
            unlink('storage/',$project->bg);
            $project->update([
                'bg' => $request->file('bg')->store('projectbg', 'public')
            ]);
        }
        if($request->file('photo')) {
            unlink('storage/',$project->photo);
            $project->update([
                'photo' => $request->file('photo')->store('projectphoto', 'public')
            ]);
        }
        if($request->file('profile')) {
            unlink('storage/',$project->profile);
            $project->update([
                'profile' => $request->file('profile')->store('projectprofile', 'public')
            ]);
        }
        if($request->file('qr')) {
            unlink('storage/',$project->qr);
            $project->update([
                'qr' => $request->file('qr')->store('projectqr', 'public')
            ]);
        }
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $request->video,
            'name' => $request->name,
            'nim' => $request->nim,
            'ig' => $request->ig,
            'wa' => $request->wa,
            'highlight' => $request->highlight,
            'category_id' => $request->category_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        unlink('storage/',$project->bg);
        unlink('storage/',$project->photo);
        unlink('storage/',$project->profile);
        unlink('storage/',$project->qr);
        $project->delete();
    }
}
