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
}
