<?php

namespace App\Http\Controllers;

use App\Models\ModelRiwayat;
use Illuminate\Http\Request;

class Kalkulator{
    private $x;
    private $y;

  function __construct($bil1,$bil2){
      $this->x = $bil1;
      $this->y = $bil2;
  }

  public function tambah(){
    try {
        $hasil = $this->x + $this->y;
        return $hasil;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
  }

  public function kurang(){
    try {
        $hasil = $this->x - $this->y;
        return $hasil;//code...
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
  }

  public function bagi(){
    try {
      $hasil = $this->x / $this->y;
      return $hasil;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
  }

  public function kali(){
    try {
        $hasil = $this->x * $this->y;
        return $hasil;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
  }
  public function modulus(){
    try {
        $hasil = $this->x % $this->y;
        return $hasil;
    } catch (\Throwable $th) {
        return $th->getMessage(); 
    }
  }
}

class ControllerKalkulator extends Controller
{
    public function hitung(Request $request)
    {
        $hasil = "";

        $input = $request->input('result');
        $operator = $request->input('operator');

        if ($operator == 'tambah') {
            $numbers = explode('+', $input);

            $bil1 = $numbers[0];
            $bil2 = $numbers[1];

            $kalkulator = new Kalkulator($bil1, $bil2);
            $hasil = $kalkulator->tambah();
        }

        elseif ($operator == 'kurang') {
            $numbers = explode('-', $input);

            $bil1 = $numbers[0];
            $bil2 = $numbers[1];

            $kalkulator = new Kalkulator($bil1, $bil2);
            $hasil = $kalkulator->kurang();
        }

        elseif ($operator == 'bagi') {
            $numbers = explode('/', $input);

            $bil1 = $numbers[0];
            $bil2 = $numbers[1];
            
            $kalkulator = new Kalkulator($bil1, $bil2);
            $hasil = $kalkulator->bagi();
            // if ($bil2 == 0) {
            //     $hasil = "Terjadi Kesalahan";
            // }else {
            //     $kalkulator = new Kalkulator($bil1, $bil2);
            //     $hasil = $kalkulator->bagi();
            // }
        }

        elseif ($operator == 'kali') {
            $numbers = explode('x', $input);

            $bil1 = $numbers[0];
            $bil2 = $numbers[1];

            $kalkulator = new Kalkulator($bil1, $bil2);
            $hasil = $kalkulator->kali();
        }
        
        elseif ($operator == 'modulus') {
            $numbers = explode('%', $input);

            $bil1 = $numbers[0];
            $bil2 = $numbers[1];

            $kalkulator = new Kalkulator($bil1, $bil2);
            $hasil = $kalkulator->modulus();
        } 
        
        else{
            $hasil = "Terjadi Kesalahan";
        }

        // $input = str_replace('x', '*', $input);
        // eval('$hasil = ' . $input . ';');   
        
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
