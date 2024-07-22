@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <h2>Assigned Users</h2>
    <ul>
        @foreach ($task->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
    <a class="btn btn-primary" href="{{ route('tasks.edit', $task) }}">Edit Task</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </form>
</div>
@endsection
