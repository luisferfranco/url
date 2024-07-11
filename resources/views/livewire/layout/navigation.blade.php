<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
  /**
   * Log the current user out of the application.
   */
  public function logout(Logout $logout): void
  {
    $logout();

    $this->redirect('/', navigate: true);
  }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-md dark:bg-gray-800 dark:border-gray-700">
  <!-- Primary Navigation Menu -->
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex items-center shrink-0">
        <a href="/" wire:navigate>
          <div class="flex items-end space-x-2">
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
            <div>Acortador</div>
          </div>
        </a>
      </div>

      @auth
        <div class="hidden sm:flex sm:items-center sm:ms-6">
          <x-gui.a
            wire:click="logout"
            value="logout"
            color="primary"
            size="xs"
            as="button"
            />
        </div>
      @else
        <div class="flex items-center space-x-2">
          <x-gui.a
            :href="route('login')"
            value="login"
            color="primary"
            size="xs"
            as="button"
            />
          <x-gui.a
            :href="route('register')"
            value="registro"
            size="xs"
            as="button"
            />
        </div>
      @endauth

      <!-- Hamburger -->
      <div class="flex items-center -me-2 sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
          <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link href="/" :active="request()->routeIs('dashboard')" wire:navigate>
        {{ __('Dashboard') }}
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
      @auth
        <div class="px-4">
          <div class="text-base font-medium text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
          <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
          <button wire:click="logout" class="w-full text-start">
            <x-responsive-nav-link>
              {{ __('Log Out') }}
            </x-responsive-nav-link>
          </button>
        </div>
      @endauth
    </div>
  </div>
</nav>
