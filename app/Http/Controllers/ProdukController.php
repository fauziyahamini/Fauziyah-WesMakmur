<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data pada tabel produk
        $data= Produk::all();
        //menampilkan ke halaman produk
        return view('produk',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data dari tabel kategori
        $kategori=Kategori::all();
        //menampilkan halaman produkAdd
        return view('produkAdd',[
            
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //menambahkan data pada tabel produk
       $data = $request->all();

       $data['foto'] = Storage::put('img', $request->file('foto'));
   
                
        Produk::create($data);
                
        return redirect('produk')->with('success', 'Data Berhasil Ditambah');
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
       //mengambil data pada tabel produk berdasarkan id
       $data = Produk::find($id);
       $kategori = Kategori::all();

       return view('produkEdit', compact('data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Produk $produk)
    {
        //update data pada tabel produk
        $data = $request->all();

        try {
            $data['foto'] = Storage::put('img', $request->foto);

            $produk->update($data);
        } catch (\Throwable $th) {
            $data['foto'] = $produk->foto;

            $produk->update($data);
        }

        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //menghapus data pada tabel produk
       Produk::where('id', $id)->delete();
       return back();
    }
}
