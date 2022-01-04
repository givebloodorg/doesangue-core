<?php

namespace GiveBlood\Units\Core\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Campaign extends Resource
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
          'title'          => $this->title,
          'description'    => $this->description,
          'image'          => $this->image,
          //'expires'        => $this->expires->format('d-m-Y H:m'),
          'start_at' => $this->created_at->format('Y-m-d h:m:s'),
          'finish_at' => $this->expires,
          'owner' => [
              'name' => $this->owner->fullname,
              'username' => $this->owner->username
          ]
        ];
    }

}
