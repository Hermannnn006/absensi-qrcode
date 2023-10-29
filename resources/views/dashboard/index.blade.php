<x-dashboard-layout>
  <div>
    <h1 class="font-semibold text-lg">Selamat datang {{ auth()->user()->name }}</h1>
    @if(auth()->user()->hasRole('mahasiswa') && $check)
      Anda belum absen hari ini, silahkan melakukan absensi sebelum waktu habis.
    @elseif(auth()->user()->hasRole('mahasiswa') && !$check)
      Anda sudah melakukan absensi hari ini.
    @endif
  </div>
</x-dashboard-layout>