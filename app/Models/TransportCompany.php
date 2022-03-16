<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportCompany extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    protected $table = "transport_company";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
