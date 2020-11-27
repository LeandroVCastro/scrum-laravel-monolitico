<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task as TaskModel;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $params = [
            'tasks' => TaskModel::orderBy('id', 'desc')->get()
        ];
        return view('system.tasks.index', $params);
    }

    public function destroy(Request $request)
    {
        if ($task = TaskModel::find($request->id)) {
            $task->delete();
            $request->session()->flash('message.success', 'Excluído com sucesso!');
            return redirect('/tasks');
        }
        $request->session()->flash('message.error', 'Tarefa Não encontrada');
        return redirect('/tasks');
    }
}
