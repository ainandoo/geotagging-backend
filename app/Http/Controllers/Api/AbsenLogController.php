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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'lat' => 'required',
            'long' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // unggah gambar
        $image = $request->file('foto');
        $image->storeAs('public/absenlogs', $image->hashName());

        //log absen
        $absenlog = AbsenLog::create([
            'foto' => $image->hashName(),
            'lat' => $request->lat,
            'long' => $request->long
        ]);

        return new AbsenLogResource(true, 'Absen log berhasil dicatat!', $absenlog);
    }
}
