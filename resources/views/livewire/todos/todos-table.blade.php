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
            <div class="flex justify-between items-center border border-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg" x-data="{ completed: false }" :class="{ 'border-none' : completed }">
                <label for="completed" class="inline-flex items-center m-4">
                    <input wire:model="completed" @click="completed = !completed" id="completed" type="checkbox" class="rounded-lg dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 cursor-pointer p-2.5" name="remember">
                </label>
                <div class="w-full p-2">
                    <p :class="{ 'line-through text-gray-400' : completed }">{{ $todo->description }}</p>
                    <span class="flex items-center justify-end text-gray-500 text-xs">{{ $todo->created_at->diffForHumans() }}</span>
                </div>

                @if ($todo->user->is(auth()->user()))
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="mr-4 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-danger-button wire:click="delete({{ $todo->id }})" class="w-full">
                                <svg class="h-4 w-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                                    <path d="M 28 6 C 25.791 6 24 7.791 24 10 L 24 12 L 23.599609 12 L 10 14 L 10 17 L 54 17 L 54 14 L 40.400391 12 L 40 12 L 40 10 C 40 7.791 38.209 6 36 6 L 28 6 z M 28 10 L 36 10 L 36 12 L 28 12 L 28 10 z M 12 19 L 14.701172 52.322266 C 14.869172 54.399266 16.605453 56 18.689453 56 L 45.3125 56 C 47.3965 56 49.129828 54.401219 49.298828 52.324219 L 51.923828 20 L 12 19 z M 20 26 C 21.105 26 22 26.895 22 28 L 22 51 L 19 51 L 18 28 C 18 26.895 18.895 26 20 26 z M 32 26 C 33.657 26 35 27.343 35 29 L 35 51 L 29 51 L 29 29 C 29 27.343 30.343 26 32 26 z M 44 26 C 45.105 26 46 26.895 46 28 L 45 51 L 42 51 L 42 28 C 42 26.895 42.895 26 44 26 z"></path>
                                </svg>
                                <span>{{ __('Delete') }}</span>
                            </x-danger-button>
                            <button wire:click="edit({{ $todo->id }})" class="w-full text-xs uppercase font-semibold">
                                <x-dropdown-link>
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                @endif

            </div>
        @endforeach
    </div>

    {{ $todos->onEachSide(1)->links() }}
</div>
