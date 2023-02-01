<?php

namespace App\Http\Controllers\Api;

use App\Models\AbsenLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbsenLogResource;
use Illuminate\Support\Facades\Validator;


class AbsenLogController extends Controller
{
    public function index(){
        $absenlogs = AbsenLog::latest()->paginate(10);

        return new AbsenLogResource(true, 'List Absen Log', $absenlogs);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'lat' => 'required',
            'long' => 'required'
            // 'mac_address' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // unggah gambar
        $image = $request->file('foto');
        $image->storeAs('public/absenlogs', $image->hashName());

        //log absen
        $absenlog = AbsenLog::create([
            'pegawai_id' => $request->pegawai_id,
            'foto' => $image->hashName(),
            'lat' => $request->lat,
            'long' => $request->long
            // 'mac_address' => $request->mac_address
        ]);

        return new AbsenLogResource(true, 'Absen log berhasil dicatat!', $absenlog);
    }

    public function show(AbsenLog $absenlog) {
        return new AbsenLogResource(true, 'Data absen log ditemukan!', $absenlog);
    }
}
