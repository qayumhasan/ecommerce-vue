<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_name'=>$this->product_name,
            'product_type'=>$this->product_type,
            'grug_type'=>$this->grug_type,
            'image'=>json_decode($this->photos),
            'thumbnail_img'=>$this->thumbnail_img,
            'product_price'=>$this->product_price,
        ];
    }
}
