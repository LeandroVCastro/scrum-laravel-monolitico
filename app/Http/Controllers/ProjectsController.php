<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project as ProjectModel;


class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $params = [
            'projects' => ProjectModel::orderBy('id', 'desc')->get()
        ];
        return view('system.projects.index', $params);
    }

    public function newRender()
    {
        return view('system.projects.new');
    }

    public function store(Request $request)
    {
        try {
            $project = new ProjectModel;
            $project->name        = $request->input('name');
            $project->description = $request->input('description');
            $path = $request->file('image')->store('public/projects');
            $path = explode('/', $path);
            $path = $path[count($path)-1];
            $project->image = $path;
            $project->save();
            $request->session()->flash('message.success', 'Salvo com sucesso!');
        } catch (\Throwable $th) {
            $request->session()->flash('message.error', 'Erro interno: ' . $th->getMessage());
        }
        return redirect('/projects');
    }

    public function destroy(Request $request)
    {
        if ($project = ProjectModel::find($request->id)) {
            $project->delete();
            $request->session()->flash('message.success', 'Excluído com sucesso!');
            return redirect('/projects');
        } else {
            return abort(404, 'Projeto não encontrado');
        }
    }
}
