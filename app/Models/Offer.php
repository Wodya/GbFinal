<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "offer";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'code'];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
