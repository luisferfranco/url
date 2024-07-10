@props(['value', 'color' => 'default'])

@php
$fondo = "";
switch($color) {
  case "success":
    $fondo = "bg-success-500 hover:bg-success-600 dark:hover:bg-success-400 text-dark";
    break;
  case "warning":
    $fondo = "bg-warning-500 hover:bg-warning-600 dark:hover:bg-warning-400 text-dark";
    break;
  case "danger":
    $fondo = "bg-danger-500 hover:bg-danger-600 dark:hover:bg-danger-400 text-dark";
    break;
  case "info":
    $fondo = "bg-info-500 hover:bg-info-600 dark:hover:bg-info-400 text-dark";
    break;
  case "primary":
    $fondo = "bg-primary-500 hover:bg-primary-600 dark:hover:bg-primary-400 text-dark";
    break;
  case "default":
    $fondo = "bg-base-500 hover:bg-base-600 dark:hover:bg-base-400 text-dark";
    break;
}
@endphp

<button
  {!! $attributes->merge(['class' => "px-2 py-1 text-sm font-bold tracking-wide uppercase transition duration-500 rounded {$fondo}"]) !!}
  >
  {{ $value ?? $slot }}
</button>
