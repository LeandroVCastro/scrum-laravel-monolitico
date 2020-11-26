<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sprint extends Model
{
    use SoftDeletes;
    
    public function status()
    {
        return $this->hasOne('App\Models\SprintsStatus', 'id', 'status_id');
    }
}
