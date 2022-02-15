<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "supplier";
    protected $primaryKey = "id";
}
