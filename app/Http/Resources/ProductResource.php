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
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock > 0 ? $this->stock : 'Out of Stock',
            'discount' => $this->discount,
            'totalPrice' => round($this->price - (($this->discount/100)*$this->price),2),
            'ratings' => $this->reviews->count() > 0 ? round($this->reviews->avg('star'),1) : 'No rating yet',
            'href' => [
                'reviews' => route('reviews.index',$this->id),
            ],
        ];
    }
}
