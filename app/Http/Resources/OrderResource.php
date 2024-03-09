<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserResource;
use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Order $resource
 */
class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'user'=> new UserResource(User::query()->find($this->resource->id)) ,
            'restaurant_id'=>Restaurant::query()->find($this->resource->restaurantId),
            'courier_id'=>Courier::query()->find($this->resource->courierId),
            'address'=>$this->resource->address,
            'status'=>$this->resource->status,
            'total_price'=>OrderItem::query()->where('price', '*', 'quantity')
        ];
    }
}
