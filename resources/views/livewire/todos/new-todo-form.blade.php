<div x-data="{ advanced: false }"
     x-on:click="document.title = @js($pageTitle.' - '.config('app.name'))"
     class="text-gray-900 dark:text-gray-100 space-y-3">

    <!-- Card Title -->
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"
        x-text="advanced ? '{{ __('Advanced Add Todo') }}' : '{{ __('Add New Todo') }}'"></h2>

    <!-- Form -->
    <form wire:submit="addTodo" x-data="{ description: '' }"  @if($errors->isEmpty()) @submit.prevent="advanced = false" @endif>
        <!-- Form Inputs -->
        <div class="space-y-3">

            <!-- Title -->
            <div x-show="advanced">
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

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-textarea-input
                    wire:model.live.blur="description"
                    x-model="description"
                    id="description"
                    class="block mt-1 w-full"
                    name="description" required
                    autofocus
                    autocomplete="description">
                </x-textarea-input>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Completed & Due Date -->
            <div x-show="advanced" class="flex flex-wrap">
                <!-- Completed -->
                <div class="flex items-center space-x-2 w-1/2">
                    <x-input-checkbox class="p-2.5" wire:model="completed" id="completed" name="completed" />
                    <x-input-label for="completed" value="{{ __('Completed') }}" />
                    <x-input-error :messages="$errors->get('completed')" class="mt-2" />
                </div>
                <!-- Due Date -->
                <div class="flex items-center space-x-2 w-1/2">
                    <x-datetime-picker-wireui
                        label="{{ __('Due date') }}"
                        placeholder="{{ __('Due date') }}"
                        wire:model.defer="due_date"
                    />
                </div>
            </div>
        </div>

        <!-- Form Buttons -->
        <div class="flex items-center justify-between mt-6">
            <!-- Advanced & Cancel -->
            <div>
                <x-special-button
                    x-on:click.prevent="advanced = !advanced"
                    x-text="advanced ? '{{ __('Simple') }}' : '{{ __('Advanced') }}'">
                </x-special-button>
            </div>
            <!-- Save -->
            <div class="inline-flex">
                <x-action-message on="todoAdded">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-primary-button class="ml-4" wire:loading.class="opacity-75" wire:loading.attr="disabled" x-bind:disabled="!description.length">
                    <div wire:loading.remove>{{ __('Add Todo') }}</div>
                    <span wire:loading>{{ __('Loading...') }}</span>
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
