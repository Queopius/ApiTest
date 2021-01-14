<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'identify' => $this->identify,
            'client' => $this->user_id ? new UserResource($this->client) : '',
            'status' => $this->order_state_lang_id ? new OrderStateLangResource($this->status) : '',
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d'),
            'products' => ProductResource::collection($this->products)
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
        ];
    }
}
