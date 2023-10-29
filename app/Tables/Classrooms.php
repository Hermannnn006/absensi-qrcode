<?php

namespace App\Tables;

use App\Models\Classroom;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Classrooms extends AbstractTable
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
        return Classroom::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch('Cari Kelas', ['name'])
            ->column(label: 'no')
            ->column(
                key: 'name',
                label: 'Kelas',
                canBeHidden: false,
                sortable: true,
                searchable: true,
                alignment: 'left'
        )
        ->column(label: 'actions');
    }
}
