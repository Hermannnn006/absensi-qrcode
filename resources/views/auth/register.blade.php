<x-guest-layout>
    <x-auth-card>
        <x-splade-form action="{{ route('register') }}" class="space-y-4">
            <x-splade-input id="name" type="text" name="name" :label="__('Nama')" required autofocus />
            <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />
            <x-splade-input id="nim" type="number" name="nim" :label="__('Nim')" required />
            <x-splade-select id="classroom_id" name="classroom_id" :options="$classrooms" option-label="name" option-value="id" :label="_('Kelas')" placeholder="Pilih Kelas" aria-required="" />
            <x-splade-input id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Konfirmasi Password')" required />

            <div class="flex items-center justify-end">
                <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?, Login') }}
                </Link>

                <x-splade-submit class="ml-4" :label="__('Daftar')" />
            </div>
        </x-splade-form>
    </x-auth-card>
</x-guest-layout>
