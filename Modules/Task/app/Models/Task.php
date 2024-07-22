<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Task extends Model
{
    use HasUserStamps;
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user');
    }
}
