<div class="text-gray-900 dark:text-gray-100 space-y-6" x-on:click="document.title = @js($pageTitle.' - '.config('app.name'))">
    <div class="flex justify-between">
        <button wire:click="sortBy('description')">Sort By Description</button>
        <button wire:click="sortBy('created_at')">Sort By Created at</button>
    </div>

    <div>
        <x-input-label for="search" class="text-xs" :value="__('Search in your todos')" />
        <div class="flex items-center">
            <x-text-input wire:model.live="search" id="search" class="block mt-1 w-2/4 text-xs" type="text" name="search" autocomplete="Search" />
            <x-secondary-button wire:click="clearSearch" class="ml-2">Clear</x-secondary-button>
        </div>
       <x-input-error :messages="$errors->get('search')" class="mt-2" />
    </div>


    @foreach($todos as $todo)
        <div class="flex justify-between border-b pb-3">
            <li class="w-3/4">{{ $todo->description }} <span class="flex items-center justify-end">{{ $todo->created_at->diffForHumans() }}</span></li>
            <button class="border p-2" wire:click="delete({{ $todo->id }})">DELETE</button>
        </div>
    @endforeach

    {{ $todos->onEachSide(1)->links() }}
</div>
