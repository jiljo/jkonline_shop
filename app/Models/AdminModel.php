<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;




     protected $table = 'products'; // your actual table

    protected $fillable = [
        'product_name',
        'product_category',
        'amount',
        'offer_amount',
        'product_image_path',
        'product_specification',
        'quantity'
    ];

    // ✅ Custom method to save product
    public static function saveProduct($data)
    {
        return self::create([
            'product_name' => $data['name'],
            'product_category' => $data['category'],
            'amount' => $data['amount'],
            'offer_amount' => $data['offer_amount'],
            'product_image_path' => $data['filepath'],
            'product_specification' => $data['specifications'],
            'quantity' =>  $data['quantity'],
            'status' => 1
        ]);
    }


}
