<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalorderModel extends Model
{
    use HasFactory;



protected $table = 'temporary_order';

    protected $primaryKey = 'tid';

    protected $fillable = [
        'unique_id',
        'product_id',
        'quantity',
    ];


}
