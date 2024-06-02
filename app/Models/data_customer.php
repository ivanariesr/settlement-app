<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer', 'cust_type', 'area', 'unit', 'no_idc'];
}
