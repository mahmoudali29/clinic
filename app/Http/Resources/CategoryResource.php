<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
        'StrName'       => $this->StrName,
        'FkParentID'    => $this->FkParentID,
      //  'href'       => [ 'link' => route('categories.show', $this->id) ],

      ];
    }
}
