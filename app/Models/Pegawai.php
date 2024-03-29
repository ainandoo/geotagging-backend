<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama_pegawai',
        'status_pegawai',
        'mac_address'
    ];

    public function absen()
    {
        return $this->hasMany( '\App\Models\AbsenLog', 'pegawai_id', 'id' );
    }
}
