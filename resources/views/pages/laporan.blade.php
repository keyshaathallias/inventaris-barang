@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-12 col-md-6 order-md-1">
                <h3>Generate Laporan</h3>
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
              <li class="breadcrumb-item"><a href="/laporan">Laporan</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="row" id="table-striped">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex">
                  <div class="col-12 col-md-6 order-md-1">
                    <h3 class="mb-4">Laporan Inventaris Barang</h3>
                  </div>
                  <div class="col-12 col-md-6 order-md-1">
                    <form action="{{ route('laporan.exportPdf') }}" method="GET">
                      <div class="input-group">
                        <div class="row">
                          <div class="col">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control" required>
                          </div>
                          <div class="col">
                            <label for="end_date">Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control" required>
                          </div>
                        </div>
                        <button type="submit" class="mt-2 rounded btn btn-danger ms-3">Export PDF</button>
                      </div>
                      <p class="mt-2 mb-0 text-sm text-mute">*Pilih tanggal pemakaian mulai dan akhir untuk di export PDF.</p>
                    </form>
                  </div>
                </div>
                <div class="card-body card-content">
                  <div class="table-responsive">
                    <table class="table mb-0 table-striped table-bordered table-hover" id="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode Barang</th>
                          <th>Jenis Barang</th>
                          <th>Jumlah</th>
                          <th>Tanggal Pembelian</th>
                          <th>Tanggal Pemakaian</th>
                          <th>Ruang</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($inventarisBarang->isEmpty())
                          <tr>
                            <td colspan="8" class="text-center">
                              <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                              <p>No Data Yet</p>
                            </td>
                          </tr>
                        @else
                          @foreach ($inventarisBarang as $item)
                            <tr>
                              <td>{{ $loop->iteration }}.</td>
                              <td>{{ $item->kode }}</td>
                              <td>{{ $item->jenis }}</td>
                              <td>{{ $item->jumlah }}</td>
                              <td>
                                @if ($item->daftarPembelian->isNotEmpty())
                                  {{ $item->daftarPembelian->first()->created_at->format('Y-m-d') }}
                                @else
                                  No Pembelian Data Available
                                @endif
                              </td>
                              <td>
                                @if ($item->daftarPemakaian->isNotEmpty())
                                  {{ $item->daftarPemakaian->first()->tanggal }}
                                @else
                                  No Pemakaian Data Available
                                @endif
                              </td>
                              <td>
                                @if ($item->daftarPemakaian->isNotEmpty())
                                  {{ $item->daftarPemakaian->first()->ruang }}
                                @else
                                  No Pemakaian Data Available
                                @endif
                              </td>
                              <td>
                                @if ($item->daftarPemakaian->isNotEmpty())
                                  {{ $item->daftarPemakaian->first()->keterangan }}
                                @else
                                  No Pemakaian Data Available
                                @endif
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
