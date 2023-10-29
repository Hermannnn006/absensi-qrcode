       <div class="sticky top-0 z-40">
            <div class="w-full h-20 px-6 bg-hitam border-b flex items-center justify-between">

              <!-- left navbar -->
              <div class="flex w-full">

                <!-- mobile hamburger -->
                <div class="inline-block lg:hidden items-center mr-4">
                    <button @click="toggle" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path v-bind:class="{ hidden: toggled, 'inline-flex': !toggled }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path v-bind:class="{ hidden: !toggled, 'inline-flex': toggled }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- clock -->
                {{-- <div class="mx-auto bg-hijau p-2 rounded text-white">
                    <clock></clock>
                </div> --}}
              </div>

              <!-- right navbar -->
              <div class="flex items-center relative">
                  <x-dropdown placement="bottom-end">
                      <x-slot name="trigger">
                          <button class="flex items-center p-2 rounded-md text-sm font-medium text-slate-200 bg-hijau hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                              <div>{{ Auth::user()->name }}</div>

                              <div class="ml-1">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                              </div>
                          </button>
                      </x-slot>

                      <x-slot name="content">
                          <x-dropdown-link href="/">
                              {{ __('Dashboard') }}
                          </x-dropdown-link>

                          <!-- Authentication -->
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <x-dropdown-link as="a" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                  {{ __('Keluar') }}
                              </x-dropdown-link>
                          </form>
                      </x-slot>
                  </x-dropdown>
              </div>

            </div>

            <!-- dropdown menu -->
            {{-- <div class="absolute bg-gray-100 border border-t-0 shadow-xl text-gray-700 rounded-b-lg w-48 bottom-10 right-0 mr-6">
                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Account</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Settings</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
            </div> --}}
            <!-- dropdown menu end -->

    </div>