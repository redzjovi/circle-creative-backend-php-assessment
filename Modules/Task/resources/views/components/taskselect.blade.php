<select 
    class="{{ $class }}" 
    name="{{ $name }}"
    {{ $required }}
  >
    <option value="">None</option>
    @foreach ($tasks as $task)
        @include('task::components/partials/_taskselectoption', [
            'excludeValue' => $excludeValue,
            'level' => 0,
            'task' => $task,
            'value' => $value,
        ])
    @endforeach
</select>