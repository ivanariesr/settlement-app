<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_idn',
        'rab',
        'dok_rab',
        'pnwrn',
        'dok_pnwrn',
        'hpp',
        'lr',
        'kontrak',
        'dok_kontrak',
        'tagihan',
        'terbayar'
    ];
}
