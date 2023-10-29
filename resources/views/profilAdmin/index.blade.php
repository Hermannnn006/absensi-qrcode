<x-dashboard-layout>
    <div class="p-4 bg-hitam mx-auto md:w-1/2 text-putih rounded-3xl border-4 border-dashed border-hijau">
        <h1 class="text-center font-bold text-xl mt-3 text-hijau">Profil Admin</h1>
        <div class="flex flex-col mt-3 px-3">
            <div class="flex flex-row gap-2 mb-8">
                <div class="w-20 font-medium">Nama</div>
                :
                <div class="w-24 font-medium">{{ $admin->name }}</div>
            </div>
            <div class="flex flex-row gap-2 mb-8">
                <div class="w-20 font-medium">Email</div>
                :
                <div class="w-24 font-medium">{{ $admin->email }}</div>
            </div>
        </div>
        <div class="flex justify-center">
            <Link href="profil-admin/{{ $admin->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded-xl font-medium hover:bg-yellow-600"><i class="fa fa-pencil-square" aria-hidden="true"></i> Profil</Link>
        </div>
    </div>
</x-dashboard-layout>