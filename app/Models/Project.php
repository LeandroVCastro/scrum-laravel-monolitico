<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    //
    use SoftDeletes;

    public function sprints()
    {
        return $this->hasMany('App\Models\Sprint');
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
}
