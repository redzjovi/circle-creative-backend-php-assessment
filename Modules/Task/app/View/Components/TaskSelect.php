<?php

namespace Modules\Task\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class TaskSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $class = '',
        public string $excludeValue = '',
        public string $name = '',
        public string $required = '',
        public array $tasks = [],
        public string $value = '',
    )
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('task::components.taskselect');
    }
}
