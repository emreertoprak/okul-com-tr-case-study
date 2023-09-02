<?php

namespace App\Http\Resources\School;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'schoolName' => $this->name,
            'schoolAddress' => $this->address,
            'schoolPhoneNumber' => $this->phone_number,
            'created_at' => $this->created_at
        ];
    }
}
