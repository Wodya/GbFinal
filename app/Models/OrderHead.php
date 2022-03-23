<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHead extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "order_head";
    protected $primaryKey = "id";

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function orderSpcs()
    {
        return $this->hasMany(OrderSpc::class);
    }
}
