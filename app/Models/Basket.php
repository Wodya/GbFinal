<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "basket";
    protected $primaryKey = "id";
}