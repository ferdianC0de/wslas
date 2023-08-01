<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'customer' => 'required',
            'no_tlp' => 'required',
            'location' => 'required',
            'status' => 'in:on process,finish',
            'image' => 'nullable',
        ]);

        $project = new Project();

        if ($request->hasFile('image')) {
            $files = [];
            foreach ($request->file('image') as $imagefile) {
                sleep(1);
                $image = $imagefile;
                $now = Carbon::now();
                $filename = strtotime($now).".".$image->getClientOriginalExtension();
                $upload = public_path().'\images\galeri';
                $image->move($upload, $filename);
                array_push($files, $filename);
            }

            $project->gallery = json_encode($files);
        }

        $project->name = $request->name;
        $project->customer = $request->customer;
        $project->no_tlp = $request->no_tlp;
        $project->location = $request->location;
        $project->status = $request->status;

        if ($project->save()) {
            return redirect(route('project.index'))->with(['message' => 'Berhasil Tambah Proyek', 'type' => 'success']);
        }else {
            return redirect(route('project.index'))->with(['message' => 'Gagal Tambah Proyek', 'type' => 'error']);
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
        $project = Project::find($id);
        return view('admin.project.detail', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.project.edit', compact('project'));
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
        $this->validate($request, [
            'name' => 'required',
            'customer' => 'required',
            'no_tlp' => 'required',
            'location' => 'required',
            'status' => 'in:on process,finish',
            'image' => 'nullable',
        ]);

        $project = Project::find($id);

        if ($request->hasFile('image')) {
            $files = [];
            foreach ($request->file('image') as $imagefile) {
                sleep(1);
                $image = $imagefile;
                $now = Carbon::now();
                $filename = strtotime($now).".".$image->getClientOriginalExtension();
                $upload = public_path().'\images\galeri';
                $image->move($upload, $filename);
                array_push($files, $filename);
            }

            $project->gallery = json_encode($files);
        }

        $project->name = $request->name;
        $project->customer = $request->customer;
        $project->no_tlp = $request->no_tlp;
        $project->location = $request->location;
        $project->status = $request->status;

        if ($project->save()) {
            return redirect(route('project.index'))->with(['message' => 'Berhasil Edit Proyek', 'type' => 'success']);
        }else {
            return redirect(route('project.index'))->with(['message' => 'Gagal Edit Proyek', 'type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Project::find($id);
        $product->delete();

        return redirect(route('project.index'))->with(['message' => 'Berhasil Hapus Proyek', 'type' => 'error']);
    }
}
