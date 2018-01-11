<?php

namespace DoeSangue\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Bank extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'name'  => $this->name,
          'url'   => $this->url,
          'location' => $this->location,
          'phone'  => $this->phone
        ];
    }
}
