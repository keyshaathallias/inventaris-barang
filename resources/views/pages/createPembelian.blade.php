@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="card card-body mb-4">
          <div class="container-fluid align-items-center">
            <div class="row align-items-center">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pembelian</h3>
              </div>
              <div class="col-12 col-md-6 order-md-1 order-first">
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

      <div class="page-heading mb-0">
        <div class="container-fluid">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/pembelian">Pembelian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Pembelian</li>
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
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Tambah Pembelian</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form action="{{ route('pembelian.store') }}" method="post" class="form form-horizontal">
                          @csrf
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label for="kode_barang">Kode Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" id="kode_barang" class="form-control" name="kode_barang"
                                  placeholder="Kode Barang">
                                @error('kode_barang')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="merk">Merk Barang</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" id="merk" class="form-control" name="merk"
                                  placeholder="Merk Barang">
                                @error('merk')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="jumlah">Jumlah Beli</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" id="jumlah" class="form-control" name="jumlah"
                                  placeholder="Jumlah Barang">
                                @error('jumlah')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
              by <a href="https://keyshaathallias.github.io/" target="_blank">Keysha</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
