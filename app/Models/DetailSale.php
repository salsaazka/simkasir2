<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'product_id',
        'qty',
        'total_product',
        'subtotal',
    ];
}
