<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project as ProjectModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User as UserModel;


class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = UserModel::find(Auth::id());
        $user->projects();
        $params = [
            'projects' => $user->projects
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
            if ($request->id) {
                $project = ProjectModel::find($request->id);
                if (!$project) {
                    $request->session()->flash('message.error', 'Projeto ID: ' . $request->id . ' não encontrado');    
                }
            } else {
                $project = new ProjectModel;
            }
            $project->name        = $request->input('name');
            $project->description = $request->input('description');
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/projects');
                $path = explode('/', $path);
                $path = $path[count($path)-1];
                Storage::delete('public/projects/' . $project->image);
                $project->image = $path;
            }
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
            $user = UserModel::find(Auth::id());
            if ($user->admin) {
                $project->delete();
                Storage::delete('public/projects/' . $project->image);
                $request->session()->flash('message.success', 'Excluído com sucesso!');
                return redirect('/projects');
            }
            $request->session()->flash('message.error', 'Você não tem permissão para isso');
            return redirect('/projects');
        }
        $request->session()->flash('message.error', 'Projeto Não encontrado');
        return redirect('/projects');
    }

    public function editRender(Request $request)
    {
        if ($project = ProjectModel::find($request->id)) {
            if ($project->checkIfLoggedUserHavePermission()) {
                $params = [
                    'project' => $project
                ];
                return view('system.projects.new', $params);
            }
        }
        return abort(404, 'Projeto não encontrado');
    }

    public function show(Request $request)
    {
        if ($project = ProjectModel::find($request->id)) {
            if ($project->checkIfLoggedUserHavePermission()) {
                $params = [
                    'project' => $project
                ];
                return view('system.projects.show', $params);
            }
        }
        return abort(404, 'Projeto não encontrado');
    }
}
