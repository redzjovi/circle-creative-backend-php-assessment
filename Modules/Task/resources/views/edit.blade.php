@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" required value="{{ $task->title }}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" require>{{ $task->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Parent Task</label>
            <div class="col-sm-10">
                <x-task::taskselect name="parent_id" class="form-control" :exclude-value="$task->id" required="" :tasks="$tasks" :value="$task->parent_id"></x-task::taskselect>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Assign to Users</label>
            <div class="col-sm-10">
                <select name="user_id[]" class="form-control" multiple required>
                    @foreach ($users as $user)
                        <option {{ $task->users->contains('id', $user->id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update Task</button>
    </form>
</div>
@endsection
