<div x-data="{ completed: @js($todo->completed) }" id="todo-{{ $key }}" :class="{ 'border-none' : completed }" class="flex justify-between items-center border border-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg">

    <x-input-checkbox wire:click="completed({{ $todo->id }}); completed = !completed " :checked="$todo->completed" id="todo-{{ $key }}" class="p-2.5 m-4" type="checkbox"/>

    <div class="w-full p-2">
        @if ($todo->is($editing))
            <livewire:todos.edit-todo :todo="$todo" :wire:key="$todo->id" />
        @else
            <p :class="{ 'line-through text-gray-400' : completed }">{{ $todo->description }}</p>
            <span class="flex items-center justify-end text-gray-500 text-xs">{{ $todo->created_at->diffForHumans() }}</span>
        @endif
    </div>

    @if ($todo->user->is(auth()->user()))
        <x-todos.action-dropdown :todo="$todo" />
    @endif

</div>
