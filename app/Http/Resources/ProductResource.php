<?php

// app/Http/Resources/ProductResource.php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->pid,
            'name'          => $this->product_name,
            'category'      => $this->product_category,
            'amount'        => (float) $this->amount,
            'image_path'    => $this->product_image_path,   // or map to a full URL if needed
            'specification' => $this->product_specification,
            'status'        => (int) $this->status,
            'created_at'    => optional($this->created_at)->toISOString(),
            'updated_at'    => optional($this->updated_at)->toISOString(),
        ];
    }
}

