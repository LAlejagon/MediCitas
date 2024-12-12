<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\DoctorInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class DateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = User::findOrFail($this->cedula_usuario);
        $doctor = DoctorInfo::findOrFail($this->doctor_id);

        return [
            'cita_id' => $this->cita_id,
            'user_id' => new UserResource($user),
            'doctor_id' => new DoctorInfoResource($doctor),
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'lugar' => $this->lugar,
            'direccion' => $this->direccion,
            'razon' => $this->razon,
        ];
    }
}