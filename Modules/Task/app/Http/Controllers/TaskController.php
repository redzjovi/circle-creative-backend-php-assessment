<?php
namespace Modules\Task\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Task\Models\Task;
use Modules\Task\Notifications\TaskAssigned;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get()->toTree();
        return view('task::index', compact('tasks'));
    }

    public function create()
    {
        $tasks = Task::get()->toTree();
        $users = User::all();
        return view('task::create', compact('tasks', 'users'));
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        
        if ($parentId = $request->input('parent_id')) {
            $parent = Task::find($parentId);
            $parent->appendNode($task);
        } else {
            $task->saveAsRoot();
        }

        foreach ($request->input('user_id') as $userId) {
            $user = User::find($userId);
            $user->tasks()->attach($task->id);
            $user->notify(new TaskAssigned($task));
        }

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        Gate::authorize('view', $task);

        return view('task::show', compact('task'));
    }

    public function edit(Task $task)
    {
        Gate::authorize('view', $task);
        $tasks = Task::get()->toTree();
        $users = User::all();
        return view('task::edit', compact('task', 'tasks', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        if ($parentId = $request->input('parent_id')) {
            $parent = Task::find($parentId);
            $parent->appendNode($task);
        } else {
            $task->saveAsRoot();
        }

        $task->users()->detach();

        foreach ($request->input('user_id') as $userId) {
            $user = User::find($userId);
            $user->tasks()->attach($task->id);
            $user->notify(new TaskAssigned($task));
        }

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
