<?php

namespace App\Http\Resources;

use App\Models\data;
use App\Models\sensors;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class alarmsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sensorName= sensors::where(["id" =>$this->sensor_id])->get()[0]->name;
//        var_dump($sensorName);
        return [
            'id' => $this->id,
            'sensor_id' => $sensorName,
            'title' => $this->title,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
