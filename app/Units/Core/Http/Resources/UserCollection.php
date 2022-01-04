<?php

namespace GiveBlood\Units\Core\Http\Resources;

use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array<string, Collection>
     */
    public function toArray($request): array
    {
        return [
          'data' => $this->collection,
        ];
    }
}
