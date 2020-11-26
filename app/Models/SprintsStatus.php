<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SprintsStatus extends Model
{
    use SoftDeletes;
    
    protected $table = 'sprints_status';
}
