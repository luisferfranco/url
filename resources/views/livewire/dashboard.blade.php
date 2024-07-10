<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('layouts.app')]
class extends Component {
  public $url;
  public $corto='';

  public function rules() {
    return [
      'url' => 'required|url',
    ];
  }

  public function messages() {
    return [
      'url.required' => 'Se requiere una URL para acortar',
      'url.url' => 'La URL debe tener un formato válido'
    ];
  }

  public function acortar() {
    $this->validate();


  }
}; ?>

<div>
  <div class="max-w-3xl pt-12 mx-auto">
    <x-gui.label value="url a acortar" />
    <x-gui.input
      type="text"
      wire:model='url'
      />

    @error('url')<div class="p-2 mt-2 bg-red-700 rounded-md text-amber-500">{{ $message }}</div>@enderror

    @if ($corto)
      <div class="p-2 mt-2 text-xl text-green-800 bg-green-200 rounded-md">
        Tu url acortado es: <span class="font-bold">{{ $corto }}</span>
      </div>
    @endif

    <x-gui.button
      value="acortar"
      color="primary"
      class="mt-2 text-center"
      wire:click='acortar'
      />
  </div>
</div>
