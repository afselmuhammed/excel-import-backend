<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_NAME = "product_name";
    const PRICE = "price";
    const SKU = "SKU";
    const DESCRIPTION = "description";

    protected $fillable = [
        'product_name',
        'price',
        'SKU',
        'description'
    ];
}
