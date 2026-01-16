@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '
    bg-black/40 border-primary/40 text-primary-50
    focus:border-secondary focus:ring-2 focus:ring-secondary/50
    rounded-none border-2 font-mono
    placeholder:text-gray-600
']) !!}>
