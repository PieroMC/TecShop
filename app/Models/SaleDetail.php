<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id', 'product_id', 
        'quantity', 'amount'
    ];

    public function product(){

        return $this->belongsTo('App\Models\Product');
    }


}
