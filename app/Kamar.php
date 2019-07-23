<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'tb_kamar';

    protected $fillable = [
        'kamar_kode', 'kamar_nama', 'kamar_desk', 'kamar_ketersediaan', 'kamar_harga',
    ];

    protected $primaryKey = 'kamar_kode';

    public $incrementing = false;

}
