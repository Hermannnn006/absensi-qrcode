<x-splade-modal close-explicitly>
    <h1 class="mb-2 mt-0 text-3xl font-normal leading-tight text-primary">Tambah data mahasiswa</h1>
    <x-splade-form>
        <p v-text="form.errors.name" />
        <x-splade-input name="nim" placeholder="Nim" :label="_('Nim')" required />
        <x-splade-input name="name" placeholder="Nama" :label="_('Nama')" required />
        <x-splade-input name="email" placeholder="Email" :label="_('Email')" required />
        <x-splade-select id="classroom_id" name="classroom_id" :options="$classrooms" option-label="name" option-value="id" :label="_('Kelas')" placeholder="Pilih Kelas" required />
        <x-splade-input id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" required />
        <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Konfirmasi Password')" required />
        <x-splade-submit class="mt-3" :label="_('Simpan')" />
    </x-splade-form>
</x-splade-modal>