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
            'projects' => ProjectModel::get()
        ];
        return view('system.projects.index', $params);
    }

    public function newRender()
    {
        return 'eh isso';
    }
}
