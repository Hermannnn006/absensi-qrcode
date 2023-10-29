<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory, PowerJoins;

    protected $guarded = ['id'];

    public function mahasiswas(): HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}