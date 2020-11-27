<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function sprint()
    {
        return $this->belongsTo('App\Models\Sprint');
    }
}
