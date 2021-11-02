<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementsRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => 'le ID ' . $this->id,
            'lib' => $this->lib,
            'description' => Str::substr($this->description, 0, 20) . ' ...',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
