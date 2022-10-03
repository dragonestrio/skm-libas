<div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('/') }}" target="_blank">
        <img src="{{ url('media/logo/cropped-kepolisian-negara-republik-indonesia-logo-483CE3543A-seeklogo.com_-180x180.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">{{ $app }}</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @if ($position == 'dashboard')
            active
          @endif" href="{{ (auth()->check() == true) ? url('dashboard') : '' }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Dashboard</span>
          </a>
        </li>
        
        @can('auth')
        <li class="nav-item">
          <a class="nav-link @if ($position == 'admin')
            active
          @endif" href="{{ url('users') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Admin</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if ($position == 'responden')
            active
          @endif" href="{{ url('respondents') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Responden</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kuesioner</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($position == 'unit fokus')
              active
            @endif" href="{{ url('units') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Unit Fokus</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($position == 'kategori pertanyaan')
              active
            @endif" href="{{ url('questions_categories') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Kategori Pertanyaan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($position == 'pertanyaan')
              active
            @endif" href="{{ url('questions') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-bullet-list-67 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Pertanyaan</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link @if ($position == 'laporan kuesioner')
            active
          @endif" href="{{ url('reports') }}" target="_blank">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Laporan Kuesioner</span>
          </a>
        </li>
        @endcan
    </ul>
    </div>
  </aside>