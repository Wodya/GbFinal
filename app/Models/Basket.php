<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "basket";
    protected $primaryKey = "id";

    public function offer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }
}
