<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
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
            'name' => $this->name,
            'totalPrice' => round($this->price - (($this->discount/100)*$this->price),2),
            'ratings' => $this->reviews->count() > 0 ? round($this->reviews->avg('star'),1) : 'No rating yet', 
            'href' => [
                'link'=> route('products.show',$this->id)
            ]
        ];
    }
}
