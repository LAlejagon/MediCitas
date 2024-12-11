<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'id' => $this->user_id,
            'appointment_id' => $this->cita_id,
            'date' => $this->fecha,
            'user' => new UserResource($this->whenLoaded('user')), // Relación con el usuario
            'date_info' => new DateResource($this->whenLoaded('date')), // Relación con la cita
        ];
    }
}
