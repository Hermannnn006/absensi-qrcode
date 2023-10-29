<x-app-layout>
  <section>
      <div class="container">
          <h3 class="text-center mt-3 font-semibold text-2xl">Data Absensi</h3>
          <div class="flex mb-3">
            <div class="mr-3">
              <x-splade-form submit-on-change method="get">
                <x-splade-input class="w-32" name="tanggal" date placeholder="Pilih Tanggal" value="{{ request('tanggal') }}" />
              </x-splade-form>
            </div>
            <div class="py-2 px-4 bg-indigo-600 rounded text-white font-medium">
              <Link href="/absensi">X</Link>
            </div>
          </div>
          <x-splade-lazy>
            <x-slot:placeholder>
                <div aria-label="Loading..." role="status" class="flex items-center justify-center space-x-2 label">
                  <svg class="h-10 w-10 animate-spin stroke-indigo-500" viewBox="0 0 256 256">
                      <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                      <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="24"></line>
                      <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                      </line>
                      <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="24"></line>
                      <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                      </line>
                      <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="24"></line>
                      <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                      <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                      </line>
                  </svg>
                  <span class="text-2xl font-medium text-indigo-500">Loading...</span>
              </div>
            </x-slot:placeholder>
            <x-splade-table :for="$presences" search-debounce="1200" />
          </x-splade-lazy>
        </div>
  </section>
  </x-app-layout>