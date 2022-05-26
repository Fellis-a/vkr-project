<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VkrVacantResource extends JsonResource
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
           
            'id_vkr'=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user'  => $this->User->name,

        ];
    }
}
