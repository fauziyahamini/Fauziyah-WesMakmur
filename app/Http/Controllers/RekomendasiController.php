<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomendasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new saran_pemakaian($request->keluhan,$request->tahun);
        
        $data = [
            'nama_jamu' => $a->namaJamu(),
            'umur' => $a->hitungUmur(),
            'khasiat'=>$a->khasiat(),
            'keluhan'=>$request->keluhan,
            'saran'=>$a->saran()
        ];
        return view('rekomendasi', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
class jamu{
    public function __construct($keluhan,$tahun)
    {
        //deklarasi variabel
        $this->keluhan=$keluhan;
        // $this->keluhan2=$keluhan2;
        $this->tahun=$tahun;
    }

    public function namaJamu(){
        
        if($this->keluhan =='keseleo'){
            return "Beras Kencur";
        }elseif($this->keluhan == 'kurang nafsu makan'){
            return "Beras Kencur";
        }elseif($this->keluhan =='darah tinggi'){
            return "Brotowali";
        }elseif($this->keluhan == 'gula darah'){
            return "Brotowali";
        }elseif($this->keluhan =='kram perut'){
            return "Temulawak";
        }elseif($this->keluhan == 'masuk angin'){
            return "Temulawak";
        }elseif($this->keluhan =='pegal-pegal'){
            return "Kunyit Asam";
        }
    }
    public function khasiat(){
        if($this->namaJamu()=='Beras Kencur'){
            return "Mengatasi Keseleo dan kurang nafsu makan";
        }elseif($this->namaJamu()=='Brotowali'){
            return "Mengatasi darah tinggi dan gula darah";
        }elseif($this->namaJamu()=='Temulawak'){
            return "Mengatasi kram perut dan masuk angin";
        }elseif($this->namaJamu()=='Kunyit Asam'){
            return "Mengatasi pegal-pegal";
        }
    }
    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }
}

class saran_pemakaian extends jamu{
    public function cekStatus()
    {
        $hasilUmur=$this->hitungUmur();
        if($hasilUmur<=10){
            return "Anak";
        }else{
            return "Dewasa";
        }
    }

    public function saran(){
        if($this->cekStatus()=='Anak'){
            if($this->namaJamu()=='Beras Kencur' && $this->keluhan =='keseleo'){
                return "Dioleskan";
            }else{
                return "Diminum 1x";
            }
            
            
        }elseif($this->cekStatus()=='Dewasa'){
            if($this->namaJamu()=='Beras Kencur' && $this->keluhan =='keseleo'){
                return "Dioleskan";
            }else{
                return "Diminum 2x";
            }
            
        }
    }
}