<x-splade-modal close-explicitly>
    <h1 class="mb-2 mt-0 text-2xl font-normal leading-tight text-primary">Ubah data kelas</h1>
    <x-splade-form :default="$classroom" action="/dashboard/data-kelas/{{ $classroom->slug }}" method="PUT">
        <p v-text="form.errors.name" />
        <x-splade-input name="name" placeholder="Nama Kelas" :label="_('Nama Kelas')" />
        <x-splade-submit class="mt-3" :label="_('Ubah Data')" />
    </x-splade-form>
</x-splade-modal>