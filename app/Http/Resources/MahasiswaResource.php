<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nim' => $this->nim,
            'name' => $this->user->name,
            'classroom' => $this->classroom->name,
            // 'created_at' => date('d-m-Y - H:i', strtotime($this->created_at)),
        ];
    }
}
