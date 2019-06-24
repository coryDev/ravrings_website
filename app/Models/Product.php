<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = ['merchant_id', 'title', 'description', 'link', 'image_link', 'price',
     'google_product_category', 'brand', 'mpn', 'gtin', 'shipping_weight', 'product_type', 'adwords_labels'];
}
