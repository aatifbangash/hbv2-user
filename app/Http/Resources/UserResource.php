<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "username" => $this->full_name,
            "email" => $this->email,
            "password" => $this->password,
            "phone_number" => $this->phone,
            "description" => $this->description,
            "is_active" => $this->is_active ? 'Yes' : 'No'
        ];
    }
}
