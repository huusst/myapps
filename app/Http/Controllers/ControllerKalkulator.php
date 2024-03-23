<?php

namespace App\Http\Controllers;

use App\Models\ModelRiwayat;
use Illuminate\Http\Request;

class ControllerKalkulator extends Controller
{
    public function hitung(Request $request)
    {
        $hasil = "";
        $input = $request->input('result');
        $input = str_replace('x', '*', $input);
        eval('$hasil = ' . $input . ';'); 
        
        $data = new ModelRiwayat([
            'operasi' => $input,
            'hasil' => $hasil,
        ]);
        $data->save();

        return redirect('/')->with('hasil', $hasil);
    }
    public function getRiwayatAll()
    {
        $riwayat = ModelRiwayat::select('operasi', 'hasil')->orderBy('id', 'desc')->get();

        return view('index', [
            'data_riwayat' => $riwayat
        ]);
    }
    public function clearRiwayatAll()
    {
        ModelRiwayat::truncate();

        $riwayat = ModelRiwayat::select('operasi', 'hasil')->orderBy('id', 'desc')->get();

        return view('index', [
            'data_riwayat' => $riwayat
        ]);
    }
}
