@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                @if ($task->children->count() > 0)
                    @include('task::partials/_child_task', ['tasks' => $task->children])
                @endif
            </li>
        @endforeach
    </ul>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
</div>
@endsection
