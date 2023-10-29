<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kirschbaum\PowerJoins\PowerJoins;

class Presence extends Model
{
    use HasFactory, PowerJoins;
    
    protected $guarded = ['id'];

    protected $with = ['mahasiswa'];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['tanggal'] ?? false, fn($query, $tanggal) => 
            $query->where('presences.created_at', 'like', '%' . $tanggal . '%')
        );  
    }
}
