<div class="text-gray-900 dark:text-gray-100 space-y-6" x-on:click="document.title = @js($pageTitle.' - '.config('app.name'))">
    <div class="flex sm:flex-row flex-col items-center justify-between space-y-3 mt-4">
        <div class="w-full sm:w-2/4 dark:bg-gray-700 p-2 rounded-lg">
            <x-input-label for="search" class="text-xs" :value="__('Search in your todos')" />
            <div class="flex items-center justify-between">
                <x-text-input wire:model.live="search" id="search" class="block mt-1 w-3/4 text-xs" type="text" name="search" autocomplete="Search" />
                <x-secondary-button wire:click="clearSearch" class="ml-2">Clear</x-secondary-button>
            </div>
            <x-input-error :messages="$errors->get('search')" class="mt-2" />
        </div>
        <div class="inline-flex justify-end space-x-2 w-full sm:w-2/4">
            <x-secondary-button wire:click="sortDirectionToggle">
                <div class="mr-2">
                    @if($sortDirection === 'asc') <span class="text-gray-400 dark:text-gray-600">asc</span> @else <span class="text-gray-400 dark:text-gray-600">desc</span> @endif
                </div>
                {{ __('Sort By') }}
            </x-secondary-button>
            <label for="sortBy">
                <select wire:model.live="sortField"
                        id="sortBy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="created_at">{{ __('Created at') }}</option>
                    <option value="due_date">{{ __('Due date') }}</option>
                    <option value="completed_at">{{ __('Completed at') }}</option>
                </select>
            </label>
        </div>
    </div>


    <div class="space-y-3">
        @if($todos->isEmpty())
            <div class="text-center text-gray-400 dark:text-gray-600 text-sm">{{ __('No todos found...') }}</div>
        @endif
        @foreach($todos as $todo)
            <x-todos.todo-card :todo="$todo" :key="$todo->id" :editing="$editing" />
        @endforeach
    </div>

    {{ $todos->onEachSide(1)->links() }}
</div>
