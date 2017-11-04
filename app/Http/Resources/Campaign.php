<?php

namespace DoeSangue\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Campaign extends Resource
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
          'title'          => $this->title,
          'description'    => $this->description,
          'image'          => $this->image,
          'expires'        => $this->expires->format('d-m-Y H:m'),
          'owner'          ''
        ];
    }
}
