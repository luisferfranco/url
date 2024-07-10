@props(['value', 'as' => 'link', 'size' => 'xs', 'color' => 'info'])

@php
if($as == 'link') {
  $clase = "hover:underline";
  switch ($color) {
    case 'primary': $clase .= ' text-primary-800 dark:text-primary-200 dark:hover:text-primary-400 hover:text-primary-600'; break;
    case 'secondary': $clase .= ' text-secondary-800 dark:text-secondary-200 dark:hover:text-secondary-400 hover:text-secondary-600'; break;
    case 'success': $clase .= ' text-success-800 dark:text-success-200 dark:hover:text-success-400 hover:text-success-600'; break;
    case 'info': $clase .= ' text-info-800 dark:text-info-200 dark:hover:text-info-400 hover:text-info-600'; break;
    case 'warning': $clase .= ' text-warning-800 dark:text-warning-200 dark:hover:text-warning-400 hover:text-warning-600'; break;
    case 'danger': $clase .= ' text-danger-800 dark:text-danger-200 dark:hover:text-danger-400 hover:text-danger-600'; break;
  }
} else {
  $clase = "rounded px-2 py-1 shadow-md uppercase tracking-wide transition ease-in-out";
  switch ($color) {
    case 'primary': $clase .= ' bg-primary-500 text-primary-100 hover:bg-primary-700'; break;
    case 'secondary': $clase .= ' bg-secondary-500 hover:bg-secondary-700 text-secondary-100'; break;
    case 'success': $clase .= ' bg-success-500 hover:bg-success-700 text-success-100'; break;
    case 'info': $clase .= ' bg-info-500 hover:bg-info-700 text-info-100'; break;
    case 'warning': $clase .= ' bg-warning-500 hover:bg-warning-700  text-warning-100'; break;
    case 'danger': $clase .= ' bg-danger-500 hover:bg-danger-700 text-danger-100'; break;
  }
}


switch ($size) {
  case 'xs': $clase .= ' text-xs'; break;
  case 'sm': $clase .= ' text-sm'; break;
  case 'md': $clase .= ' text-md'; break;
  case 'lg': $clase .= ' text-lg'; break;
  case 'xl': $clase .= ' text-xl'; break;
}
@endphp

<a {!! $attributes->merge(['class' => "{$clase} transition duration-500"]) !!} wire:navigate>{{ $value ?? $slot }}</a>