@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid align-items-center">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Dashboard</h3>
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
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <section>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="px-4 card-body py-4-5">
                  <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                      <div class="mb-2 stats-icon blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                          class="bi bi-cart-fill" viewBox="0 0 16 16">
                          <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                      <h6 class="font-semibold text-muted">Pembelian</h6>
                      <h6 class="mb-0 font-extrabold">{{ number_format($totalPembelian) }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @if (Auth::user()->roles == 'administrator' || Auth::user()->roles == 'operator')
              <div class="col">
                <div class="card">
                  <div class="px-4 card-body py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="mb-2 stats-icon green">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
                            <path
                              d="M8.5 1.75v2.716l.048-.002c.311-.012.74-.016 1.05.046.28.056.543.18.738.288.274.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z" />
                          </svg>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="font-semibold text-muted">Pemakaian</h6>
                        <h6 class="mb-0 font-extrabold">{{ number_format($totalPemakaian) }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif

            @if (Auth::user()->roles == 'administrator')
              <div class="col">
                <div class="card">
                  <div class="px-4 card-body py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="mb-2 stats-icon purple">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-stack" viewBox="0 0 16 16">
                            <path
                              d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                            <path
                              d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                          </svg>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="font-semibold text-muted">Inventalisir</h6>
                        <h6 class="mb-0 font-extrabold">{{ number_format($totalInventaris) }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="px-4 card-body py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="mb-2 stats-icon red">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path
                              d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z" />
                          </svg>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="font-semibold text-muted">Akun</h6>
                        <h6 class="mb-0 font-extrabold">{{ number_format($totalUser) }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>

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
                      <table class="table mb-3 table-striped table-bordered table-hover">
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
                          @if ($dataPembelian->isEmpty())
                            <tr>
                              <td colspan="9" class="text-center">
                                <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                                <p>No Data Yet</p>
                              </td>
                            </tr>
                          @else
                            @foreach ($dataPembelian as $item)
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
                      <a href="{{ route('pembelian.index') }}" class="text-sm">See more data →</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @if (Auth::user()->roles == 'administrator' || Auth::user()->roles == 'operator')
            <!-- Table Data Pemakaian -->
            <section class="section">
              <div class="row" id="table-striped">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header d-flex">
                      <div class="order-last col-12 col-md-6 order-md-1">
                        <h3>Data Pemakaian</h3>
                      </div>
                      <div class="order-first col-12 col-md-6 order-md-2">
                        <div class="float-start float-lg-end">
                          <a href="{{ route('pemakaian.create') }}"
                            class="float-right m-auto btn btn-primary">Tambah</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-content">
                      <div class="table-responsive">
                        <table class="table mb-3 table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Kode Barang</th>
                              <th>Jumlah Pemakaian</th>
                              <th>Tanggal Pemakaian</th>
                              <th>Ruang</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="table-responsive">
                            @if ($dataPemakaian->isEmpty())
                              <tr>
                                <td colspan="7" class="text-center">
                                  <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                                  <p>No Data Yet</p>
                                </td>
                              </tr>
                            @else
                              @foreach ($dataPemakaian as $item)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->kode_barang }}</td>
                                  <td>{{ $item->jumlah }}</td>
                                  <td>{{ $item->tanggal }}</td>
                                  <td>{{ $item->ruang }}</td>
                                  <td>{{ $item->keterangan }}</td>
                                  <td class="d-flex">
                                    <a href="{{ route('pemakaian.edit', $item->id) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-fill"></i></a>
                                    <a href="{{ route('pemakaian.destroy', $item->id) }}" class="btn btn-danger ms-2"
                                      data-confirm-delete="true">
                                      <i class="bi bi-trash3-fill"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                            @endif
                          </tbody>
                        </table>
                      <a href="{{ route('pemakaian.index') }}" class="text-sm">See more data →</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          @endif

          @if (Auth::user()->roles == 'administrator')
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
                        <table class="table mb-3 table-striped table-bordered table-hover">
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
                            @if ($dataBarang->isEmpty())
                              <tr>
                                <td colspan="7" class="text-center">
                                  <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                                  <p>No Data Yet</p>
                                </td>
                              </tr>
                            @else
                              @foreach ($dataBarang as $barang)
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
                      <a href="{{ route('barang.index') }}" class="text-sm">See more data →</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Data Pengguna -->
            <section class="section">
              <div class="row" id="table-striped">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header d-flex">
                      <div class="col-12 col-md-6 order-md-1">
                        <h3>Data Pengguna</h3>
                      </div>
                      <div class="col-12 col-md-6 order-md-2">
                        <div class="float-start float-lg-end">
                          <a href="{{ route('user.create') }}" class="float-right m-auto btn btn-primary">Tambah</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-content">
                      <div class="table-responsive">
                        <table class="table mb-3 table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="table-responsive">
                            @if ($dataUser->isEmpty())
                              <tr>
                                <td colspan="5" class="text-center">
                                  <img src="/img/No Data Yet.png" alt="No Data Yet" width="300" class="m-3">
                                  <p>No Data Yet</p>
                                </td>
                              </tr>
                            @else
                              @foreach ($dataUser as $item)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->email }}</td>
                                  <td>{{ $item->roles }}</td>
                                  <td class="d-flex">
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-fill"></i></a>
                                    <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger ms-2"
                                      data-confirm-delete="true">
                                      <i class="bi bi-trash3-fill"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                            @endif
                          </tbody>
                        </table>
                      <a href="{{ route('user.index') }}" class="text-sm">See more data →</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          @endif
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
