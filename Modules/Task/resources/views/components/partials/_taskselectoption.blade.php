@if ($task->id === $excludeValue)
@else
    <option
        {{ $task->id === $value ? 'selected' : '' }}
        value="{{ $task->id }}"
    >
        @for ($i = 0; $i < $level; $i++)
            &nbsp;&nbsp;
        @endfor
        {{ $task->title }}
    </option>
@endif

@if ($task->children->count() > 0)
    @foreach ($task->children as $child)
        @include('task::components/partials/_taskselectoption', [
            'level' => $level + 1,
            'task' => $child,
            'value' => $value,
        ])
    @endforeach
@endif