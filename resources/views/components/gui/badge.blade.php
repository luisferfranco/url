@props(['value', 'color' => 'default', 'size' => 'sm'])

@php
switch ($color) {
  case 'success':
    $col = "bg-success-200 text-success-900 dark:bg-success-900 dark:text-success-200";
    break;
  case 'warning':
    $col = "bg-warning-200 text-warning-900 dark:bg-warning-900 dark:text-warning-200";
    break;
  case 'danger':
    $col = "bg-danger-200 text-danger-900 dark:bg-danger-900 dark:text-danger-200";
    break;
  case 'info':
    $col = "bg-info-200 text-info-900 dark:bg-info-900 dark:text-info-200";
    break;
  case 'default':
    $col = "bg-base-200 text-base-900 dark:bg-base-900 dark:text-base-200";
    break;
}

switch ($size) {
  case 'xs':
    $col .= " text-xs";
    break;
  case 'sm':
    $col .= " text-sm";
    break;
  case 'md':
    $col .= " text-md";
    break;
  case 'lg':
    $col .= " text-lg";
    break;
  case 'xl':
    $col .= " text-xl";
    break;

}
@endphp

<span
  {!! $attributes->merge(['class' => "px-1 py-0.5 rounded uppercase {$col} shadow"]) !!}
  >{{ $value ?? $slot }}</span>
