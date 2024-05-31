@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid align-items-center">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Inventarisir</h3>
              </div>
              <div class="order-first col-12 col-md-6 order-md-1">
                <div class="float-start float-lg-end">
                  <div class="d-flex align-items-center">
                    <div class="name fs-6">
                      <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                      <h6 class="mb-0 text-muted">{{ Auth::user()->roles }}</h6>
                    </div>
                    <div class="avatar avatar-xl ms-3">
                      <img src="/dist/assets/compiled/jpg/3.jpg" alt="Face 1">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <header class="mb-1">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
      </div>

      <div class="mb-0 page-heading">
        <div class="container-fluid">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/barang">Inventarisir</a></li>
              <li class="breadcrumb-item" aria-current="page">Edit Barang</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">

        <!-- table striped -->
        <section class="section">
          <div class="card-body card-content">
            <section id="basic-horizontal-layouts">
              <div class="row match-height">
                <div class="col">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Edit Barang</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form action="{{ route('barang.update', $data->kode) }}" method="post"
                          class="form form-horizontal">
                          @csrf
                          @method('put')
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label for="kode">Kode Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" value="{{ $data->kode }}" id="kode" class="form-control"
                                  name="kode" placeholder="Kode Barang">
                                @error('kode')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="nama">Nama Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" value="{{ $data->nama }}" id="nama" class="form-control"
                                  name="nama" placeholder="Nama Barang">
                                @error('nama')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="jenis">Jenis Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" value="{{ $data->jenis }}" id="jenis" class="form-control"
                                  name="jenis" placeholder="Jenis Barang">
                                @error('jenis')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="jumlah">Jumlah Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="number" value="{{ $data->jumlah }}" id="jumlah" class="form-control"
                                  name="jumlah" placeholder="Jumlah Barang">
                                @error('jumlah')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="harga">Harga Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="number" value="{{ $data->harga }}" id="harga" class="form-control"
                                  name="harga" placeholder="Harga Barang">
                                @error('harga')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="mb-1 btn btn-primary me-1">Edit</button>
                                <button type="reset" class="mb-1 btn btn-light-secondary me-1">Reset</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </section>
      </div>
      <footer>
        <div class="clearfix mb-0 footer text-muted">
          <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
              by <a href="https://keyshaathallias.github.io/" target="_blank">Keysha</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
