<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $primaryKey = ['purchase_id', 'product_id'];
    public $incrementing = false;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
