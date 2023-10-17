<div class="text-gray-900 dark:text-gray-100 space-y-6" x-on:click="document.title = @js($pageTitle.' - '.config('app.name'))">
    <div class="flex justify-between">
        <x-secondary-button wire:click="sortBy('description')">Sort By Description</x-secondary-button>
        <x-secondary-button wire:click="sortBy('created_at')">Sort By Created at</x-secondary-button>
    </div>

    <div class="flex items-center justify-start mt-4">
        <div class="w-3/4 dark:bg-gray-700 p-2 rounded-lg">
            <x-input-label for="search" class="text-xs" :value="__('Search in your todos')" />
            <div class="flex items-center justify-between">
                <x-text-input wire:model.live="search" id="search" class="block mt-1 w-2/4 text-xs" type="text" name="search" autocomplete="Search" />
                <x-secondary-button wire:click="clearSearch" class="ml-2">Clear</x-secondary-button>
            </div>
            <x-input-error :messages="$errors->get('search')" class="mt-2" />
        </div>
    </div>


    <div class="space-y-3">
        @if($todos->isEmpty())
            <div class="text-center text-gray-400 dark:text-gray-600 text-sm">{{ __('No todos found...') }}</div>
        @endif
        @foreach($todos as $todo)
            <x-todos.todo-card :todo="$todo" :key="$todo->id" />
        @endforeach
    </div>

    {{ $todos->onEachSide(1)->links() }}
</div>
