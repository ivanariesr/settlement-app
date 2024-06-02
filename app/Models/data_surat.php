<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_ids',
        'no_penugasan',
        'tgl_penugasan',
        'dok_penugasan',
        'noba_kspktn',
        'tglk_dok',
        'dok_kspktn',
        'noba_pp',
        'tglp_dok',
        'dok_pp',
        'noba_stp',
        'tgls_dok',
        'dok_stp'
    ];
}
