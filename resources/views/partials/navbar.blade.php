<nav class="w-10 mt-3 me-4">
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
                  <h6 class="mb-0 text-muted">{{ Auth::user()->email }}</h6>
                </div>
                <div class="avatar avatar-xl ms-3">
                  <img src="/dist/assets/compiled/jpg/1.jpg" alt="Face 1">
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
</nav>
