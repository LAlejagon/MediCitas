<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->doctor_id,
            'name' => $this->name,
            'specialty' => new SpecialtyResource($this->whenLoaded('specialty')), // Relación con la especialidad
            'schedule' => ScheduleResource::collection($this->whenLoaded('schedule')), // Relación con el horario
        ];
    }
}
