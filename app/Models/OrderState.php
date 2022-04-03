<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderState extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "order_state";
    protected $primaryKey = "id";

    public function orderSpc(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrderSpc::class, 'order_spc_id', 'id');
    }
    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
