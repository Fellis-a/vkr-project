<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Years extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $preserveKeys = false;
    public function toArray($request)
    {
        return parent::toArray($request);
    
    }
}
