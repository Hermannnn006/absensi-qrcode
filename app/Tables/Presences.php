<?php

namespace App\Tables;

use App\Models\Presence;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Presences extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Presence::query()->filter(request(['tanggal']));
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $classroom = \App\Models\Classroom::pluck('name', 'slug')->toArray();
        $table
            ->withGlobalSearch(columns: [
                'mahasiswa.user.name',
                'mahasiswa.classroom.name', 
                'mahasiswa.nim', 
                'created_at'
            ])
            ->selectFilter(
                key: 'mahasiswa.classroom.slug',
                options: $classroom,
                label: 'Kelas',
                noFilterOption: true,
                noFilterOptionLabel: 'Semua Kelas'
            )
            ->defaultSort('created_at')
            ->column('mahasiswa.nim', label: 'Nim', sortable: true)
            ->column('mahasiswa.user.name', label: 'Nama', sortable: true)
            ->column('mahasiswa.classroom.name', label: 'Kelas', sortable: true)
            ->column('presence_status', label: 'Keterangan', sortable: true)
            ->column('created_at', label: 'Waktu', sortable: true)
            ->paginate(8)
            ->export(
                label: 'Export data absensi',
                filename: 'absensi '. date('d-m-Y') .'.xlsx',
            );
    }
}