<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint as SprintModel;
use App\Models\Project as ProjectModel;
use App\Models\SprintsStatus as SprintStatusModel;

class SprintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $params = [
            'sprints' => SprintModel::orderBy('id', 'desc')->get()
        ];
        return view('system.sprints.index', $params);
    }
    
    public function newRender()
    {
        $params = [
            'projects' => ProjectModel::orderBy('id', 'desc')->get(),
            'status'   => SprintStatusModel::orderBy('id', 'desc')->get()
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
                }
            } else {
                $sprint = new SprintModel;
            }
            $sprint->title        = $request->input('title');
            $sprint->description  = $request->input('description');
            $sprint->project_id   = $request->input('project_id');
            $sprint->status_id   = $request->input('status_id');
            $sprint->save();
            $request->session()->flash('message.success', 'Salvo com sucesso!');
        } catch (\Throwable $th) {
            $request->session()->flash('message.error', 'Erro interno: ' . $th->getMessage());
        }
        return redirect('/sprints');
    }
}
