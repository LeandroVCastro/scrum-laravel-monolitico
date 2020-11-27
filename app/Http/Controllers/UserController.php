<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::user()->admin) {
            $params = [
                'users' => UserModel::withTrashed()->get()
            ];
            return view('system.users.index', $params);
        }
        return redirect('/dashboard');
    }

    public function newRender()
    {
        return view('system.users.new');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->admin) {
            $request->session()->flash('message.erro', 'Você não tem permissão para isso');
            return redirect('/users');
        }
        try {
            if ($request->id) {
                $user = UserModel::find($request->id);
                if (!$user) {
                    $request->session()->flash('message.error', 'Usuário ID: ' . $request->id . ' não encontrado');    
                    return redirect('/user');
                }
            } else {
                $user = new UserModel;
            }
            if (!$user->id) {
                $user->password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->admin = $request->admin ? true : false;
            $user->save();
            $request->session()->flash('message.success', 'Salvo com sucesso!');
            return redirect('/users');;
        } catch (\Throwable $th) {
            $request->session()->flash('message.error', 'Erro interno: ' . $th->getMessage());
        }
        return redirect('/users');
    }

    public function editRender(Request $request)
    {
        if (!Auth::user()->admin) {
            $request->session()->flash('message.error', 'Você não tem permissão para isso');
            return redirect('/dashboard');
        }
        if ($user = UserModel::withTrashed()->find($request->id)) {
            $params = [
                'user' => $user
            ];
            return view('system.users.new', $params);
        }
        $request->session()->flash('message.error', 'Usuário não encontrado');
        return redirect('/users');
        
    }
}
