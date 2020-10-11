<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'description', 
        'product_categories_id', 
        'number_document', 
        'stock', 'unit_price',
        'brand_id',
    ];

    public function product_categories(){

        return $this->belongsTo('App\Models\ProductCategory');
    }
    public function brand(){

        return $this->belongsTo('App\Models\Brand');
    }


}
