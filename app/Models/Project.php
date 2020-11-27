<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User as UserModel;

class Project extends Model
{
    //
    use SoftDeletes;

    public function sprints()
    {
        return $this->hasMany('App\Models\Sprint');
    }

    public function project_role_user()
    {
        return $this->hasMany('App\Models\ProjectRoleUser');
    }

    public function scopeGetByLoggedUserRoles($query)
    {
        return $query->select(
            'projects.*'
        )->rightJoin('project_role_users as pru', function($join) {
            $join->on('pru.project_id', '=', 'projects.id');
            $join->on('pru.user_id', '=', DB::raw(Auth::id()));
        })
        ->whereNull('pru.deleted_at');
    }

    public function checkIfLoggedUserHavePermission()
    {
        $user = UserModel::find(Auth::id());
        if (!$user) {
            return false;
        }
        if ($user->admin) {
            return true;
        } else {
            $project_role_user = $this->project_role_user->where('user_id', $user->id)->first();
            return $project_role_user ? true : false;
        }
    }
}
