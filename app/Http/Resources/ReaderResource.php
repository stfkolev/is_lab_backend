<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReaderResource extends JsonResource
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
            'id' => $this->id,

            'firstName' => $this->firstName,
            'lastName' => $this->lastName,

            'address' => $this->address,
            'UCN' => $this->UCN,
            'work' => $this->work,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
