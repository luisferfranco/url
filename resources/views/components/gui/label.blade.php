@props(['value'])

<label {!! $attributes->merge(['class' => "block text-xs font-bold tracking-wide uppercase text-primary-500"])!!}>{{ $value ?? $slot }}</label>
