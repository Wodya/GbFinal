<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'code'];

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

}
