<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titik;
use App\Models\butTitik;

class TitikController extends Controller
{
    public function index()
    {
        $titiks = ButTitik::all();
        return view('titik2',['titiks'=>$titiks]);
    }

    public function store(Request $request)
{
    
    // dd($request->garisx1);
    // Simpan hanya nama dan jarak dalam database
    $request->validate([
        'namaAwal' => 'required',
        'namaAkhir' => 'required',
        'totalJarak' => 'required'

    ]);
    $titik = new Titik;
    $titik->TitikAwal = $request->namaAwal;
    $titik->TitikAkhir = $request->namaAkhir;
    $titik->jarak = $request->totalJarak;
    $titik->save();

    return redirect('/');
}

    public function hitungJarak()
    {
        $titiks = Titik::orderBy('id', 'asc')->get();
        $jarak_total = 0;

        for ($i = 0; $i < count($titiks) - 1; $i++) {
            $jarak = sqrt(pow(($titiks[$i + 1]->posisi_x - $titiks[$i]->posisi_x), 2) + pow(($titiks[$i + 1]->posisi_y - $titiks[$i]->posisi_y), 2));
            $jarak_total += $jarak;
        }

        // Konversi piksel ke sentimeter (diasumsikan 1 piksel = 1 cm)
        $jarak_total_cm = $jarak_total;

        return $jarak_total_cm;
    }
}
