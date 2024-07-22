<?php

namespace Modules\Task\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Task\Models\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Task $task)
    {
        return $task->users->contains($user) || $task->created_by == $user->id;
    }
}
