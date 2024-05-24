<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ButTitikController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\TitikController;
use App\Models\info;

class InfoController extends Controller
{
    public function index()
    {
        $ButTitiks = new ButTitikController();
        $titikss = new TitikController();
        $hew = new HewanController();
        $Lines = $titikss->all();
        $hewans = $hew->all();
        // dd($titiks);
        $titiks= $ButTitiks->all();
        $arys = $this->GetAllInfo();
        
        return view('setInfo',['titiks'=>$titiks,'lines'=>$Lines,'hewans'=>$hewans,'arys'=>$arys]);
    }
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        $request->validate([
            'titik' => 'required',
            'NamaHewan' => 'required'

        ]);
        // dd($request);
        $titik = new info();
        $titik->Titik = $request->titik;
        $titik->Lokasi_atau_hewan = $request->NamaHewan;
        $titik->save();

        return redirect('/setinfo');
    }
    public function cek(){
        // $this->getinfo('tes');
        $this->GetAllInfo();
    }

    public function GetAllInfo(){
        $ButTitiks = new ButTitikController();
        $titikss = new TitikController();
        $hew = new HewanController();
        $Lines = $titikss->all();
        $hewans = $hew->all();
        // dd($titiks);
        $titiks= $ButTitiks->all();
        // dd($titiks);
        $arys = [];
        foreach($titiks as $titik){
            $ary = [];
            array_push($ary,$titik->Nama);
            $isi = $this->getinfo($titik->Nama);
            array_push($ary,$isi);
            array_push($arys, $ary);
        }
        // dd($arys);
        return $arys;
        
        
    }
    public function getinfo($titik){
        $results = Info::where('Titik', $titik)
                    ->orderBy('Lokasi_atau_hewan', 'asc')
                    ->pluck('Lokasi_atau_hewan');

        // dd($titik,$results);
        $ary = [];
        // dd(count($ary));
        if(count($results)>0){
            foreach($results as $a){
                array_push($ary,$a);
            }
        }
        return $ary;
    }
}
