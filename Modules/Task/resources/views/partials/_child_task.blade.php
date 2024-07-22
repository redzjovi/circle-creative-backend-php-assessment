<ul>
    @foreach ($tasks as $task)
        <li>
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
            @if ($task->children->count() > 0) {
                @include('tasks::partials/_child_task', ['tasks' => $task->children])
            @endif
        </li>
    @endforeach
</ul>