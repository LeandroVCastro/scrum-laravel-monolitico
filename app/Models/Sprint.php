<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Sprint extends Model
{
    use SoftDeletes;
    
    public function status()
    {
        return $this->hasOne('App\Models\SprintsStatus', 'id', 'status_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
