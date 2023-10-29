<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nim' => $this->mahasiswa->nim,
            'name' => $this->mahasiswa->user->name,
            'classroom' => $this->mahasiswa->classroom->name,
            'presence_status' => $this->presence_status,
            'created_at' => $this->created_at,
        ];
    }
}
