@extends('layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="card card-body mb-4">
          <div class="container-fluid align-items-center">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Managemen Akun</h3>
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
              <li class="breadcrumb-item"><a href="/user">Managemen Akun</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <section class="section" id="basic-horizontal-layouts">
          <div class="row match-height" id="table-striped">
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tambah Pengguna</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <form action="{{ route('user.store') }}" method="POST" class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="name">Name</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="name" id="name" class="form-control" name="name" placeholder="Name">
                          @error('name')
                            <small>{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="email">Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                          @error('email')
                            <small>{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="roles">Role</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="roles" aria-label="Default select example" name="roles">
                            <option selected>Pilih Role</option>
                            <option value="administrator">Administrator</option>
                            <option value="petugas">Petugas</option>
                            <option value="operator">Operator</option>
                          </select>
                          @error('roles')
                            <small>{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="password">Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="password" id="password" class="form-control" name="password"
                            placeholder="Password">
                          @error('password')
                            <small>{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="mb-1 btn btn-primary me-1">Submit</button>
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
