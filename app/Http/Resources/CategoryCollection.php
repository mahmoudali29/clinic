<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'StrName'       => $this->StrName,
        'FkParentID'    => $this->FkParentID,
        'href'       => [ 'link' => route('categories.show', $this->id) ],

      ];
    }
}
