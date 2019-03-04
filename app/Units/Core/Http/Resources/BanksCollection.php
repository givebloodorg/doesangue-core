<?php

namespace GiveBlood\Units\Core\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BanksCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
