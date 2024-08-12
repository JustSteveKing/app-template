<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @property Plan $resource */
class PlanResource extends JsonResource
{
    /** @return array<string,mixed> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'stripe_id' => $this->resource->stripe_id,
            'product_id' => $this->resource->stripe_product_id,
            'nickname' => $this->resource->nickname,
            'interval' => [
                'amount' => $this->resource->amount,
                'frame' => $this->resource->interval,
                'count' => $this->resource->interval_count,
            ],
        ];
    }
}
