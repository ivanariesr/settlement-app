<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_idm',
        'no_idn',
        'no_idc',
        'no_ids',
        'nm_pekerjaan',
        'rkap',
        'stts_pkerjaan',
        'no_idpre',
        'no_idpni',
        'no_idppm',
        'prktype',
        'no_PRKorWO',
        'tgl_mulai',
        'tgl_akhir',
        'stts_admin',
        'ket_progress'
    ];
}
