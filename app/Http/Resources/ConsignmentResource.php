<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (int) $this->id,
            'company' => $this->company,
            'contact' => $this->contact,
            'addressline1' => $this->addressline1,
            //'addressline2' => $this->addressline2,
            //'addressline3' => $this->addressline3,
            'city' => $this->city,
            'country' => $this->country,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at
        ];
    }
}
