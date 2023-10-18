<div>
    <form wire:submit="updateTodo">
        <x-text-input wire:model.live.blur="description" wire:keydown.enter="updateTodo" wire:keydown.escape="cancel" class="w-full" type="text" name="description" autocomplete="Description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <x-secondary-button class="mt-4" wire:click.prevent="cancel">{{ __('Cancel') }}</x-secondary-button>
    </form>
</div>
