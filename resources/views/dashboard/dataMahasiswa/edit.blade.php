<x-splade-modal close-explicitly>
    <h1 class="mb-2 mt-0 text-2xl font-normal leading-tight text-primary">Ubah data mahasiswa</h1>
    <x-splade-form :default="$mahasiswa" action="/dashboard/data-mahasiswa/{{ $mahasiswa->nim }}" method="PUT">
        <p v-text="form.errors.name" />
        <x-splade-input name="nim" placeholder="Nim" :label="_('Nim')" />
        <x-splade-input name="user.name" placeholder="Nama" :label="_('Nama')" />
        <x-splade-input name="user.email" placeholder="Email" :label="_('Email')" />
        <x-splade-select id="classroom_id" name="classroom_id" :options="$classrooms" option-label="name" option-value="id" :label="_('Kelas')" placeholder="Pilih Kelas" />
        <x-splade-submit class="mt-3" :label="_('Ubah Data')" />
    </x-splade-form>
</x-splade-modal>