<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $table = 'data_armada';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    const UPDATED_AT = null;
    protected $fillable =
    [
        'id',
        'jenis_kendaraan',
        'no_dokumen_perawatan',
        'no_seri_kendaraan'
    ];
}
