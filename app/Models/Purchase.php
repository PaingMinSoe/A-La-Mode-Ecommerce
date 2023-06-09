<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
