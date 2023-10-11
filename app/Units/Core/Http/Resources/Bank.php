<?php

namespace GiveBlood\Units\Core\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bank extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
          'name'  => $this->name,
          'url'   => $this->url,
          'location' => $this->location,
          'phone'  => $this->phone
        ];
    }
}
