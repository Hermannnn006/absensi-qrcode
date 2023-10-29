<x-splade-modal close-explicitly>
    <h1 class="mb-2 mt-0 text-3xl font-normal leading-tight text-primary">Tambah data kelas</h1>
    <x-splade-form>
        <p v-text="form.errors.name" />
        <x-splade-input name="name" placeholder="Nama Kelas" :label="_('Nama Kelas')" />
        <x-splade-submit class="mt-3" :label="_('Simpan')" />
    </x-splade-form>
</x-splade-modal>