<x-dashboard-layout>
    <h3 class="text-center mt-3 font-semibold text-3xl mb-3">Data Absensi</h3>
    <div class="flex mb-3">
        <div class="mr-3">
          <x-splade-form method="get">
            <div class="flex gap-3">
              <x-splade-input class="w-32" name="tanggal" date placeholder="Pilih Tanggal" value="{{ request('tanggal') }}" />
              <button type="submit" class="py-2 px-4 bg-sky-600 text-white rounded">Filter</button>
            </div>
          </x-splade-form>
        </div>
        <div class="py-2 px-4 bg-red-600 rounded text-white font-medium">
          <Link href="/dashboard/data-absensi">X</Link>
        </div>
      </div>
      <x-splade-table :for="$presences" as="$presence">
        <x-splade-cell presence_status>
          <x-splade-form submit-on-change background debounce="500" :default="$presence" action="/dashboard/data-absensi/{{ $presence->id }}" method="PUT">
            <x-splade-select name="presence_status">
              <option value="hadir">Hadir</option>
              <option value="tidak hadir">Tidak Hadir</option>
              <option value="ijin">Ijin</option>
           </x-splade-select>
          </x-splade-form>
        </x-splade-cell>
      </x-splade-table>
</x-dashboard-layout>