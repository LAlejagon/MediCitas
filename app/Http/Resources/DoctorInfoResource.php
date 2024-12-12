<?php

namespace App\Http\Resources;

use App\Models\Specialty;
use App\Models\User;
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
        {
            $user = User::findOrFail($this->user_id);
            $consultory = $this->consultorio;
            $specialty = Specialty::findOrFail($this->especialidad_id);
    
            return response()->json([
                'user_id' => new UserResource($user),
                'conultory' => $consultory,
                'specialty' => new SpecialtyResource($specialty),
            ]);
        }
    }
}
