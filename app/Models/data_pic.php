<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pic extends Model
{
    use HasFactory;
    protected $fillable = ['no_idp', 'nama', 'posisi'];

}
