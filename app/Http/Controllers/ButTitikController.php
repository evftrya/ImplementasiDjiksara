<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\butTitik;

class ButTitikController extends Controller
{
    public function index()
    {
        $titik = ButTitik::all();
        // dd($titik[0]['xDot']);
        return view('newbuttitik',['titiks'=>$titik]);
    }

    public function store(Request $request)
    {
        
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        $request->validate([
            'xDot'=> 'required',
            'yDot'=> 'required'

        ]);
        $titik = new ButTitik;
        $titik->nama = $this->Makenama();
        $titik->xDot = $request->xDot+110;
        $titik->yDot = $request->yDot;
        $titik->save();

        return redirect('/ButTitik');
    }

    public function Makenama(){
        $array = ["A","B","C","D","E","F","G","H","I","K","L",
        "M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        $back = null;
            for($i=0;$i<count($array);$i++){
                // dd($abjad);
                if($this->check($array[$i])!=true){
                    $back = $array[$i];

                    // dd($back);
                }
            }
            if($back==null){
                dd('PERBARUI AA-AZ');

            }
        return $back;
    }

    public function check($abjad){
        $buts = ButTitik::all();
        $ada = false;
        foreach($buts as $but){
            // dd("nama : ","tes",$but->Nama);
            if($but->Nama == $abjad){
                $ada = true;
            }
        }
        return $ada;
    }
}
