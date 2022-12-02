@extends('template')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah produk</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Tambah produk</h5>
          
          <form class="row g-3" action="{{route ('produk.store')}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            <input type="hidden" name="id" >
            <div class="col-md-12">
              <label class="form-label">Nama Produk</label>
              <input type="text" class="form-control"  name="nama_produk">
            </div>
            <div class="col-md-12">
                <label lass="form-label">Foto</label>
                <input class="form-control" type="file" name="foto">
              </div>
            <div class="col-md-6">
              <label class="form-label">Harga</label>
              <input type="number" class="form-control" name="harga">
            </div>
           
            <div class="col-6">
              <label  class="form-label">Kategori</label>
              <select class="form-select" name="kategori_id">
                     @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                     @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control" name="desc_produk">
              </div>
            
            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              
            </div>
          </form>

        </div>
      </div>
</main>
@endsection