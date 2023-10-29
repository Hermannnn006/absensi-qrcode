<?php

namespace App\Tables;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Mahasiswas extends AbstractTable
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
        return Mahasiswa::query();
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
            ->defaultSort('nim')
            ->selectFilter(
                key: 'classroom.slug',
                options: $classroom,
                label: 'Kelas',
                noFilterOption: true,
                noFilterOptionLabel: 'Semua Kelas'
            )
            ->withGlobalSearch(columns: ['nim', 'user.name', 'classroom.name'])
            ->column('no')
            ->column('nim', sortable: true)
            ->column('user.name', label: 'Nama', sortable: true)
            ->column('classroom.name', label: 'Kelas', sortable: true)
            ->column('actions')
            ->paginate(10);
    }
}
