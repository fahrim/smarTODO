@props(['checked' => false])
<label>
    <input {{ $checked ? 'checked' : '' }} name="{!! $attributes->get('id') !!}" {!! $attributes->merge(['class' => 'rounded-lg dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 cursor-pointer']) !!}>
</label>
