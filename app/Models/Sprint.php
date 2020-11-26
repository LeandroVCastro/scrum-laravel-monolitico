<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    public function status()
    {
        return $this->hasOne('App\Models\SprintsStatus', 'id', 'status_id');
    }
}
