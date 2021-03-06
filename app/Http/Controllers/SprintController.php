<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint as SprintModel;
use App\Models\Project as ProjectModel;
use App\Models\SprintsStatus as SprintStatusModel;
use Illuminate\Support\Facades\Auth;
use App\User as UserModel;

class SprintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = UserModel::find(Auth::id());
        $params = [
            'sprints' => SprintModel::orderBy('id', 'desc')->get(),
            'user' => $user
        ];
        return view('system.sprints.index', $params);
    }
    
    public function newRender()
    {
        $params = [
            'projects' => ProjectModel::orderBy('id', 'desc')->get(),
            'status'   => SprintStatusModel::get()
        ];
        return view('system.sprints.new', $params);
    }

    public function store(Request $request)
    {
        try {
            if ($request->id) {
                $sprint = SprintModel::find($request->id);
                if (!$sprint) {
                    $request->session()->flash('message.error', 'Sprint ID: ' . $request->id . ' não encontrado');    
                    return redirect('/sprints');
                }
            } else {
                $sprint = new SprintModel;
            }
            $project = ProjectModel::find($request->input('project_id'));
            if ($project->loggedUserHavePermissionToSave()) {
                $sprint->title        = $request->input('title');
                $sprint->description  = $request->input('description');
                $sprint->project_id   = $request->input('project_id');
                $sprint->status_id   = $request->input('status_id');
                $sprint->save();
                $request->session()->flash('message.success', 'Salvo com sucesso!');
                return redirect('/sprints');;
            }
            $request->session()->flash('message.error', 'Você não tem permissão para isso');
        } catch (\Throwable $th) {
            $request->session()->flash('message.error', 'Erro interno: ' . $th->getMessage());
        }
        return redirect('/sprints');
    }

    public function destroy(Request $request)
    {
        if ($sprint = SprintModel::find($request->id)) {
            if ($sprint->project->loggedUserHavePermissionToSave()) {
                $sprint->delete();
                $request->session()->flash('message.success', 'Excluído com sucesso!');
                return redirect('/sprints');
            }
            $request->session()->flash('message.error', 'Você não tem permissão para isso');
            return redirect('/sprints');
        }
        $request->session()->flash('message.error', 'Sprint Não encontrado');
        return redirect('/sprints');
    }

    public function editRender(Request $request)
    {
        if ($sprint = SprintModel::find($request->id)) {
            if ($sprint->project->loggedUserHavePermissionToSave()) {
                $params = [
                    'sprint' => $sprint,
                    'projects' => ProjectModel::orderBy('id', 'desc')->get(),
                    'status'   => SprintStatusModel::get()
                ];
                return view('system.sprints.new', $params);
            }
        }
        $request->session()->flash('message.error', 'Você não tem permissão para isso');
        return redirect('/sprints');
    }

    public function show(Request $request)
    {
        if ($sprint = SprintModel::find($request->id)) {
            if ($sprint->project->loggedUserHavePermissionToView()) {
                $params = [
                    'sprint' => $sprint,
                    'user' => UserModel::find(Auth::id())
                ];
                return view('system.sprints.show', $params);
            }
        }
        return abort(404, 'Sprint não encontrado');
    }
}
