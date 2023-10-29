<x-dashboard-layout>
    <div class="p-4 bg-hitam mx-auto md:w-1/2 text-putih rounded-3xl border-4 border-dashed border-hijau">
        <h1 class="text-center font-bold text-xl mt-3 text-hijau">Profil Mahasiswa</h1>
        <div class="flex flex-col mt-3 px-3">
            @foreach ($mahasiswa as $mhs)
                <div class="flex flex-row gap-2 mb-8">
                    <div class="w-20 font-medium">Nim</div>
                    :
                    <div class="w-24 font-medium">{{ $mhs->nim }}</div>
                </div>
                <div class="flex flex-row gap-2 mb-8">
                    <div class="w-20 font-medium">Nama</div>
                    :
                    <div class="w-24 font-medium capitalize">{{ $mhs->user->name }}</div>
                </div>
                <div class="flex flex-row gap-2 mb-8">
                    <div class="w-20 font-medium">Kelas</div>
                    :
                    <div class="w-24 font-medium capitalize">{{ $mhs->classroom->name }}</div>
                </div>
                <div class="flex flex-row gap-2 mb-8">
                    <div class="w-20 font-medium">Email</div>
                    :
                    <div class="w-24 font-medium">{{ $mhs->user->email }}</div>
                </div>
            @endforeach
        </div>
        <div class="text-center flex gap-3 justify-evenly">
            <div>
                <Link href="profil/{{ $mhs->nim }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded-xl font-medium hover:bg-yellow-600"><i class="fa fa-pencil-square" aria-hidden="true"></i> Profil</Link>
            </div>
            <div>
                <Link href="generate-id-card" class="bg-blue-600 text-white px-4 py-2 rounded-xl font-medium hover:bg-blue-800"><i class="fa fa-print" aria-hidden="true"></i> Kartu Mahasiswa</Link>
            </div>
        </div>
    </div>
</x-dashboard-layout>