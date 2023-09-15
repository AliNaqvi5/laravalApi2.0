<?php

namespace App\Http\Resources;

use App\Models\data;
use App\Models\controls;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ControlResource extends JsonResource
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
            'nameControl' => $this->nameControl,
            'value' => $this->value,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
