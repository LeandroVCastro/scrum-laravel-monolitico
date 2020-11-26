<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint as SprintModel;

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
}
