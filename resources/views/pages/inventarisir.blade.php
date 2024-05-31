@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-12 col-md-6 order-md-1">
                <h3>Inventaris Barang</h3>
              </div>
              <div class="col-12 col-md-6 order-md-1">
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
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <!-- Table Data Barang -->
        <section class="section">
          <div class="row" id="table-striped">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex">
                  <div class="col-12 col-md-6 order-md-1">
                    <h3>Data Barang</h3>
                  </div>
                  <div class="col-12 col-md-6 order-md-2">
                    <div class="float-start float-lg-end">
                      <a href="{{ route('barang.create') }}" class="float-right m-auto btn btn-primary">Tambah</a>
                    </div>
                  </div>
                </div>
                <div class="card-body card-content">
                  <div class="table-responsive">
                    <table class="table mb-0 table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Jenis</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="table-responsive">
                        @if ($daftarBarang->isEmpty())
                          <tr>
                            <td colspan="7" class="text-center">
                              <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                              <p>No Data Yet</p>
                            </td>
                          </tr>
                        @else
                          @foreach ($daftarBarang as $barang)
                            <tr>
                              <td>{{ $loop->iteration }}.</td>
                              <td>{{ $barang->kode }}</td>
                              <td>{{ $barang->nama }}</td>
                              <td>{{ $barang->jenis }}</td>
                              <td>{{ $barang->jumlah }}</td>
                              <td>{{ $barang->harga }}</td>
                              <td class="d-flex">
                                <a href="{{ route('barang.edit', $barang->kode) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-fill"></i></a>
                                <a href="{{ route('barang.destroy', $barang->kode) }}" class="btn btn-danger ms-2"
                                  data-confirm-delete="true">
                                  <i class="bi bi-trash3-fill"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
