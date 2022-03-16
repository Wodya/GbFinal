<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DistributionPoint extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "distribution_point";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
