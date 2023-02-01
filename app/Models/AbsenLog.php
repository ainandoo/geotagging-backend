<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawai_id',
        'foto',
        'lat',
        'long'
        // 'mac_addres
    ];

    public function pegawai()
    {
        return $this->belongsTo( '\App\Models\Pegawai',  'pegawai_id', 'id' );
    }
}
