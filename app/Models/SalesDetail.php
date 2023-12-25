<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;
    protected $table = 'sales_detail';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(Inventories::class, 'inventory_id');
    }
}
