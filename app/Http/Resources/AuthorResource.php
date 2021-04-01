<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            'books' => $this->books,
        ];
    }
}
