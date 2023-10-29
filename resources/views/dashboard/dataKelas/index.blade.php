<x-dashboard-layout>
<h1 class="text-center mt-3 font-semibold text-3xl mb-3">Data Kelas</h1>
<div class="mx-auto lg:w-2/3">
    <div class="mb-3">
        <Link modal href="/dashboard/data-kelas/create" class="p-2 rounded bg-blue-500 text-white hover:bg-blue-800">
            <i class="fa-solid fa-plus"></i> Data Kelas
        </Link>
    </div>
    <x-splade-table :for="$classrooms" search-debounce="1000">
        <x-slot name="body">
            <tbody>
                @if($classrooms->resource->count())
                    @foreach($classrooms->resource as $classroom)
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $classroom->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <Link modal href="/dashboard/data-kelas/{{ $classroom->slug }}/edit" class="mr-2">
                                    <span class="bg-yellow-400 p-2 rounded text-white hover:bg-yellow-600">
                                        <i class="fa-solid fa-pen"></i>
                                    </span>
                                </Link>
                                <Link confirm="Yakin ingin menghapus data?" href="data-kelas/{{ $classroom->slug }}" class="bg-red-400 p-2 rounded text-white hover:bg-red-800" method="DELETE">
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
</div>
</x-dashboard-layout>