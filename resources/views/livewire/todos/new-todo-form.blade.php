<div class="text-gray-900 dark:text-gray-100" x-on:click="document.title = @js($pageTitle.' - '.config('app.name'))">
    <form wire:submit="addTodo">
        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('TODO Description')" />
            <x-text-input wire:model.live.blur="description" id="description" class="block mt-1 w-full" type="text" name="description" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4" wire:loading.class="opacity-75" wire:loading.attr="disabled">
                <div wire:loading.remove>{{ __('Add Todo') }}</div>
                <span wire:loading>{{ __('Loading...') }}</span>
            </x-primary-button>
        </div>
    </form>
</div>
