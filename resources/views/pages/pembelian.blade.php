@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Pembelian</h3>
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
              <li class="breadcrumb-item" aria-current="page"><a href="/pembelian">Pembelian</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <!-- Table Data Pembelian -->
        <section class="section">
          <div class="row" id="table-striped">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex">
                  <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Data Pembelian</h3>
                  </div>
                  <div class="order-first col-12 col-md-6 order-md-2">
                    <div class="float-start float-lg-end">
                      <a href="{{ route('pembelian.create') }}" class="float-right m-auto btn btn-primary">Tambah</a>
                    </div>
                  </div>
                </div>
                <div class="card-body card-content">
                  <div class="table-responsive">
                    <table class="table mb-0 table-striped table-bordered table-hover">
                      <thead class="table-responsive">
                        <tr>
                          <th>No.</th>
                          <th>Kode Pembelian</th>
                          <th>Kode Barang</th>
                          <th>Merk</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Total</th>
                          <th>Tanggal Pembelian</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="table-responsive">
                        @if ($pembelian->isEmpty())
                          <tr>
                            <td colspan="9" class="text-center">
                              <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                              <p>No Data Yet</p>
                            </td>
                          </tr>
                        @else
                          @foreach ($pembelian as $item)
                            <tr>
                              <td>{{ $loop->iteration }}.</td>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->kode_barang }}</td>
                              <td>{{ $item->merk }}</td>
                              <td>{{ $item->jumlah }}</td>
                              <td>{{ $item->barang->harga ?? 'N/A' }}</td>
                              <td>{{ $item->total() }}</td>
                              <td>{{ $item->created_at->format('Y-m-d') }}</td>
                              <td class="d-flex">
                                <a href="{{ route('pembelian.edit', $item->id) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-fill"></i></a>
                                <a href="{{ route('pembelian.destroy', $item->id) }}" class="btn btn-danger ms-2"
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
