@extends('template')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Koleksi Produk</h5>
                  
                  <a href="{{ route('produk.create')}}" class="btn btn-primary">Tambah Produk</a>
                  <!-- Default Table -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['nama_produk']}}</td>
                            <td><img src="{{asset('storage/' .$item->foto)}}" alt="" width="100px"></td>
                            <td>{{$item['harga']}}</td>
                            <td>{{$item->kategori->nama_kategori}}</td>
                            <td>{{$item['desc_produk']}}</td>
                            <td>
                                <a href="produk/delete/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                <a href="{{ route('produk.edit',$item->id) }}" class="btn btn-success"><i class="fas fa-pen"></i>Edit</a>
                        </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                  </table>
                  <!-- End Default Table Example -->
                </div>
              </div>
            </div>
          </div>
    </section>

  </main><!-- End #main -->
@endsection