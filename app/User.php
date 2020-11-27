<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Project as ProjectModel;
use App\Models\Sprint as SprintModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function project_role_users()
    {
        return $this->hasMany('App\Models\ProjectRoleUser');
    }

    public function projects()
    {
        if ($this->admin) {
            $this->projects = ProjectModel::orderBy('id', 'desc')->get();
        } else {
            $this->projects = ProjectModel::GetByLoggedUserRoles()->get();
        }
    }
}
