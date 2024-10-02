<?php

namespace App\Http\Resources\DiscutionReponse;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscutionReponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
