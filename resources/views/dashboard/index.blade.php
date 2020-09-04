@extends('layouts.master')

@section('title', 'Dashboard')
@section('content')
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="single_product_desc"> 
              <div class="product-meta-data">
                      <div class="line"></div>
                <p class="product-price">Halo, {{Auth::user()->name}}</p>
                  <a href="product-details.html">
                      <h6><b>Selamat Datang di Sistem Penunjang Keputusan Penentuan Prioritas Perbaikan Jalan Lingkungan</b></h6>
                  </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(assets/spk/img/product-img/1.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(assets/spk/img/product-img/2.jpg);" class="">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(assets/spk/img/product-img/3.jpg);" class="">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(assets/spk/img/product-img/4.jpg);" class="">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="assets/spk/img/product-img/1.jpg">
                                    <img class="d-block w-100" src="assets/spk/img/product-img/1.jpg" alt="First slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="assets/spk/img/product-img/2.jpg">
                                    <img class="d-block w-100" src="assets/spk/img/product-img/2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="assets/spk/img/product-img/3.jpg">
                                    <img class="d-block w-100" src="assets/spk/img/product-img/3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="assets/spk/img/product-img/4.jpg">
                                    <img class="d-block w-100" src="assets/spk/img/product-img/4.jpg" alt="Fourth slide">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->

                    <div class="short_overview my-5">
                      <div class="line"></div>
                      <p>Ini merupakan aplikasi Sistem Penunjang Keputusan (SPK) untuk menentukan prioritas perawatan jalan lingkungan. Aplikasi ini menggunakan metode Simple Additive Weighting. Adapun cara penggunaan aplikasi ini adalah sebagai berikut:</p>
                      <ol>
                          <li>1. Masukkan data jalan</li>
                          <li>2. Tentukan kriteria-kriteria yang menjadi dasar penilaian pada SPK.</li>
                          <li>3. Masukkan nilai setiap jalan pada kriteria yang sudah ditentukan dalam fitur "Input Nilai"</li>
                          <li>4. Lihatlah hasil penghitungan pada fitur "Hasil"</li>
                          <li>5. Klik "Export PDF" untuk mencetak hasil perhitungan dalam bentuk berkas PDF</li>
                      </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content1')
<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h3>Halo, {{Auth::user()->name}}</h3>
                <h3><b>Selamat Datang di Sistem Penunjang Keputusan Jalan Lingkungan</b></h3>
                <p>Ini merupakan aplikasi Sistem Penunjang Keputusan (SPK) untuk menentukan prioritas perawatan jalan lingkungan. Aplikasi ini menggunakan metode Simple Additive Weighting. Adapun cara penggunaan aplikasi ini adalah sebagai berikut:</p>
                <ol>
                    <li>Masukkan data jalan</li>
                    <li>Tentukan kriteria-kriteria yang menjadi dasar penilaian pada SPK.</li>
                    <li>Masukkan nilai setiap jalan pada kriteria yang sudah ditentukan dalam fitur "Input Nilai"</li>
                    <li>Lihatlah hasil penghitungan pada fitur "Hasil"</li>
                    <li>Klik "Export PDF" untuk mencetak hasil perhitungan dalam bentuk berkas PDF</li>
                    <li>Klik "Reset" untuk menghapus semua data yang telah dibuat</li>
                </ol>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop