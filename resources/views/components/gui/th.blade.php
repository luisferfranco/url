@props(["value"])

<th
  {!! $attributes->merge(["class" => "px-4 py-2"]) !!}
  >
  {{ $value ?? $slot }}
</th>
