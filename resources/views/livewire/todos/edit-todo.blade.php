<div>
    <form wire:submit="updateTodo">
        <x-text-input wire:model.live.blur="description" wire:keydown.enter="updateTodo" wire:keydown.escape="cancel" class="w-full" type="text" name="description" autocomplete="Description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <div class="mt-4 flex justify-between">
            <div>
                <x-primary-button >{{ __('Save') }}</x-primary-button>
                <x-secondary-button wire:click.prevent="cancel">{{ __('Cancel') }}</x-secondary-button>
            </div>
            <x-special-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'advanced-edit-todo')">{{ __('Advanced') }}</x-special-button>
        </div>
    </form>

    <x-modal name="advanced-edit-todo" class="flex items-center content-center" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="updateTodo" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Advanced Edit Todo') }}
            </h2>

            <div class="mt-6 space-y-3">
                <div>
                    <x-input-label for="title" value="{{ __('Title') }}" />
                    <x-text-input
                        wire:model.live.blur="title"
                        id="title"
                        name="title"
                        type="text"
                        class="mt-1 block w-full sm:w-3/4"
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" value="{{ __('Description') }}" />
                    <x-textarea-input id="description" name="description"
                        wire:model.live.blur="description"
                        class="mt-1 block w-full"
                    ></x-textarea-input>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex flex-wrap">
                    <div class="flex items-center space-x-2 w-1/2">
                        <x-input-checkbox class="p-2.5" wire:model="completed" id="completed" name="completed" />
                        <x-input-label for="completed" value="{{ __('Completed') }}" />
                        <x-input-error :messages="$errors->get('completed')" class="mt-2" />
                    </div>
                    <div class="flex items-center space-x-2 w-1/2">
                        <x-input-label for="due_date" class="whitespace-nowrap" value="{{ __('Due date') }}" />
                        <input type="date" wire:model="due_date" name="due_date" id="due_date" aria-label="Due time" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 border-transparent focus:border-gray-500 focus:bg-white dark:focus:bg-gray-600 focus:ring-0">
                    </div>

                </div>

            </div>

            <div class="flex items-center justify-between mt-6">
                <div>
                    @if($todo->completed_at)
                        <x-elements.badge color="indigo">{{ __('Completed at') }} {{ $todo->completed_at->format('j M Y, g:i a') }}</x-elements.badge>
                    @endif
                </div>
                <div>
                    <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-primary-button class="ml-3">{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>

</div>
