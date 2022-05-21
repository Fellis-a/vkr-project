<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VkrResource extends JsonResource
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
            'id' =>$this->id,
            'title' =>$this->title,
            'specialty' =>$this->specialty->code,
            'year' =>$this->year,
            'user' =>$this->User->name,
            'tech' =>$this->tech,
            'mark' =>$this->mark,
            'essay' =>$this->essay,
            
        ];
    }
}
