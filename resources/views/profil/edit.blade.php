<x-dashboard-layout>
<div class="mx-auto lg:w-1/2 border-2 border-solid p-4 rounded bg-gray-100">
    <h1 class="mb-2 mt-0 text-2xl font-normal leading-tight text-primary">Ubah Profil</h1>
    <x-splade-form :default="$mahasiswa" action="/profil/{{ $mahasiswa->nim }}" method="PUT">
        <p v-text="form.errors.name" />
        <x-splade-input name="nim" placeholder="Nim" :label="_('Nim')" required />
        <x-splade-input name="user.name" placeholder="Nama" :label="_('Nama')" required />
        <x-splade-input name="user.email" placeholder="Email" :label="_('Email')" required />
        <x-splade-select id="classroom_id" name="classroom_id" :options="$classrooms" option-label="name" option-value="id" :label="_('Kelas')" placeholder="Pilih Kelas" required />
        <x-splade-submit class="mt-3 text-putih bg-hijau hover:bg-green-800" :label="_('Ubah Profil')" />
    </x-splade-form>

    <h1 class="mb-2 text-2xl font-normal leading-tight text-primary mt-6">Ubah Password</h1>
    <x-splade-form method="put" :action="route('password.update')" class="mt-3 space-y-6" preserve-scroll>
        <x-splade-input id="current_password" name="current_password" type="password" :label="__('Password Lama')" autocomplete="current-password" />
        <x-splade-input id="password" name="password" type="password" :label="__('Password Baru')" autocomplete="new-password" />
        <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Konfimasi Password')" autocomplete="new-password" />
            <x-splade-submit class="text-putih bg-hijau hover:bg-green-800" :label="__('Ubah Password')" />
    </x-splade-form>
</div>
</x-dashboard-layout>