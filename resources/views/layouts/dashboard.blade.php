<div class="leading-normal tracking-normal">
  <x-splade-toggle>
    <div class="flex flex-wrap">
      <x-sidebar></x-sidebar>
      <div class="flex flex-col w-full pl-0 lg:pl-64 h-screen">
        <x-header></x-header>
        <div class="p-6 flex-grow">
          {{ $slot }}
        </div>
        <x-footer></x-footer>
      </div>
    </div>
  </x-splade-toggle>
  </div>