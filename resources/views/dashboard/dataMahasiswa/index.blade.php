<x-dashboard-layout>
    <h3 class="text-center mt-3 font-semibold text-3xl mb-3">Data Mahasiswa</h3>
    <div class="mb-3">
        <Link modal href="/dashboard/data-mahasiswa/create" class="p-2 rounded bg-blue-500 text-white hover:bg-blue-800">
            <i class="fa-solid fa-plus"></i> Data Mahasiswa
        </Link>
    </div>
    <x-splade-table :for="$mahasiswas" search-debounce="1000">
        <x-slot name="body">
            <tbody>
                @if($mahasiswas->resource->count())
                    @foreach($mahasiswas->resource as $mahasiswa)
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $mahasiswa->nim }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $mahasiswa->user->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $mahasiswa->classroom->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <Link modal href="/dashboard/data-mahasiswa/{{ $mahasiswa->nim }}/edit" class="mr-2">
                                    <span class="bg-yellow-400 p-2 rounded text-white hover:bg-yellow-600">
                                        <i class="fa-solid fa-pen"></i>
                                    </span>
                                </Link>
                                <Link confirm="Yakin ingin menghapus data?" href="data-mahasiswa/{{ $mahasiswa->nim }}" class="bg-red-400 p-2 rounded text-white hover:bg-red-800" method="DELETE">
                                    <i class="fa-solid fa-trash"></i>
                                </Link>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-b">
                        <td class="col-span-2 text-center whitespace-nowrap px-6 py-4">tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </x-slot>
    </x-splade-table>
</x-dashboard-layout>