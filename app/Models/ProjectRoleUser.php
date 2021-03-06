<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectRoleUser extends Model
{
    use SoftDeletes;

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project_role()
    {
        return $this->belongsTo('App\Models\ProjectRole');
    }
}
