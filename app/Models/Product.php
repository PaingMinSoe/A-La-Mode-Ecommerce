<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function scopeSearch($query, array $filters) {

        $query->when($filters['sort'] ?? false, function($query, $sort) {
            if ($sort == 'price_low_to_high') {
                $query->orderBy('price', 'ASC');
            } else if($sort == 'price_high_to_low') {
                $query->orderBy('price', 'DESC');
            } else if($sort == 'newest') {
                $query->latest();
            }
        });

        $query->when($filters['search'] ?? false, function($query, $search) {
            $query
                ->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('color', 'like', '%' . $search . '%')
                ->orWhereHas('category', function($query) use ($search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('brand', function($query) use ($search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            $query->whereHas('category', function($query) use ($category) {
                return $query->whereIn('name', $category);
            });
        });

        $query->when($filters['gender'] ?? false, function($query, $gender) {
            $query->whereIn('gender', $gender);
        });

        $query->when($filters['brand'] ?? false, function($query, $brand) {
            $query->whereHas('brand', function($query) use ($brand) {
                return $query->whereIn('name', $brand);
            });
        });
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
