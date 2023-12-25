<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $table = 'purchase_detail';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(Inventories::class, 'inventory_id');
    }
}
