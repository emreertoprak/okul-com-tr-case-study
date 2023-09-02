<?php

namespace App\Http\Resources\Offer;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'userName' => $this->user->name ?? null,
            'userEmail' => $this->user->email ?? null,
            'UserPhoneNumber' => $this->user->phone_number ?? null,
            'schoolName' => $this->school->name,
            'schoolAddress' => $this->school->address,
            'schoolPhoneNumber' => $this->school->phone_number,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];
    }
}
