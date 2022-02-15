<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "brand";
    protected $primaryKey = "id";
}
