<?php

use App\Models\Liga;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('layouts.app')]
class extends Component {
  public $url;
  public $titulo;
  public $personalizado;

  public $corto='';

  public $ligas;

  public function mount() {
    if (auth()->check()) {
      $this->ligas = auth()->user()->ligas;
    }
  }

  public function rules() {
    return [
      'url' => 'required|url',
      'personalizado' => 'nullable|unique:ligas,personalizado',
    ];
  }

  public function messages() {
    return [
      'url.required' => 'Se requiere una URL para acortar',
      'url.url' => 'La URL debe tener un formato válido',
      'personalizado.unique' => 'Esa URL personalizada ya la ganó alguien más, intenta con otra',
    ];
  }

  public function acortar() {
    $this->validate();

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';

    do {
      $randomString = substr(str_shuffle($characters), 0, 5);
    } while (DB::table('ligas')->where('corto', $randomString)->orWhere('personalizado', $randomString)->exists());

    $this->corto = $randomString;

    Liga::create([
      'original' => $this->url,
      'corto' => $this->corto,
      'titulo' => $this->titulo ?? null,
      'personalizado' => $this->personalizado ?? null,
      'user_id' => auth()->id() ?? null,
    ]);

    $this->corto = url('/') . '/g/' . $this->corto;
    $this->url = '';
    $this->titulo = '';
    $this->personalizado = '';

    if (auth()->check()) {
      $this->ligas = auth()->user()->ligas;
    }
  }
}; ?>

<div>
  <div class="max-w-3xl pt-12 mx-auto">
    <section>
      @if (session('error'))
        <div class="px-4 py-6 mb-12 text-lg text-red-800 bg-red-200 rounded-md">{!! session('error') !!}</div>
      @endif

      <x-gui.label value="url a acortar (obligatorio)" />
      <x-gui.input
        type="text"
        wire:model='url'
        autofocus
        />
      @error('url')<div class="p-2 mt-2 bg-red-700 rounded-md text-amber-500">{{ $message }}</div>@enderror

      @auth
        <div class="grid grid-cols-2 my-2 space-x-4">
          <div>
            <x-gui.label value="titulo (opcional)" />
            <x-gui.input
              type="text"
              wire:model='titulo'
              />
          </div>
          <div>
            <x-gui.label value="url personalizado (opcional)" />
            <x-gui.input
              type="text"
              wire:model='personalizado'
              />
              @error('personalizado')<div class="p-2 mt-2 bg-red-700 rounded-md text-amber-500">{{ $message }}</div>@enderror
          </div>
        </div>
      @endauth

      @if ($corto)
        <div class="p-2 mt-2 text-xl text-green-800 bg-green-200 rounded-md">

          Tu url acortado es: <x-gui.a :href="$corto" as="link" color="primary" size="xl"><span class="font-bold">{{ $corto }}</span></x-gui.a>
        </div>
      @endif

      <x-gui.button
        value="acortar"
        color="primary"
        class="mt-2 text-center"
        wire:click='acortar'
        />
    </section>

    @auth
      <h2 class="mt-8 text-2xl font-bold">Tus ligas acortadas</h2>
      <x-gui.table>
        <x-gui.thead>
          <tr>
            <x-gui.th>id</x-gui.th>
            <x-gui.th>url</x-gui.th>
            <x-gui.th>url corto</x-gui.th>
            <x-gui.th>clicks</x-gui.th>
          </tr>
        </x-gui.thead>

        <tbody>
          @foreach ($ligas as $liga)
            <x-gui.tr-hover>
              <x-gui.td>{{ $liga->id }}</x-gui.td>
              <x-gui.td>
                <div class="flex flex-col">
                  @if ($liga->titulo)
                    <div>{{ $liga->titulo }}</div>
                  @endif
                  <div>
                    <x-gui.a :href="$liga->original" as="link" color="primary" size="sm">{{ $liga->original }}</x-gui.a>
                  </div>
                </div>
              </x-gui.td>
              <x-gui.td>
                <x-gui.a :href="url('/') . '/g/' . $liga->personalizado ?? $liga->corto" as="link" color="primary" size="sm">
                  {{ url('/') . '/g/' . $liga->personalizado ?? $liga->corto }}
                </x-gui.a>
              </x-gui.td>
              <x-gui.td>999</x-gui.td>
            </x-gui.tr-hover>
          @endforeach
        </tbody>
      </x-gui.table>
    @endauth
  </div>
</div>
