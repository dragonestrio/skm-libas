@extends('layouts.template')
@section('app')

<main>
  @include('partials.sidebar.custom')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white text-capitalize">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white text-capitalize active">{{ $position }}</li>
          </ol>
          <h6 class="font-weight-bolder text-white text-capitalize mb-0">{{ $position }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            {{-- EMPTY --}}
          </div>
          <ul class="navbar-nav  justify-content-end">

            @auth
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="{{ url('login') }}" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none text-capitalize">{{ auth()->user()->name }}</span>
                </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a href="{{ url('profile') }}" class="dropdown-item border-radius-md">
                    <div class="d-flex justify-content-center text-capitalize fw-bold">
                        <i class="fa fa-user pe-2 pt-1"></i>
                        <span class="">Profile</span>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <form action="{{ url('logout') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button class="dropdown-item form-control btn btn-primary bg-primary text-center text-capitalize fw-bold border-radius-md">logout</button>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a href="{{ url('login') }}" class="nav-link text-white p-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="ps-2">Sign In</span>
              </a>
            </li>
            @endauth

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row text-light">
        <div class="col-6 col-lg-6">
          <p class="p-0 m-0 text-capitalize fw-bolder text-start">filter unit</p>
        </div>
        <div class="col-6 col-lg-6">
          <p class="p-0 m-0 text-capitalize fw-bolder text-end">berdasarkan</p>
        </div>
      </div>
      <form action="" method="get" class="pb-5">
        <div class="input-group">
          <select name="unit" onchange="change_unit()" class="form-control text-center border border-2 border-top-0 border-bottom-0 border-start-0 border-dark">
            @if (request()->input('unit') != null)
              @foreach ($unit as $item)
                @if ($item->id == request()->input('unit'))
                  <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                @endif
              @endforeach
            @endif
            @foreach ($unit as $item)
                <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
            @endforeach
          </select>
          <select name="date" onchange="change_date()" class="form-control text-center rounded-end">
            @if (request()->input('date') != null)
              @switch(request()->input('date'))
                  @case('time')
                      <option value="time">{{ ucwords('jam') }}</option>
                      @break
                  @case('day')
                      <option value="day">{{ ucwords('hari') }}</option>
                      @break
                  @case('month')
                      <option value="month">{{ ucwords('bulan') }}</option>
                      @break
                  @case('year')
                      <option value="year">{{ ucwords('tahun') }}</option>
                      @break
                  @default
                      
              @endswitch
            @endif
            <option value="time">{{ ucwords('jam') }}</option>
            <option value="day">{{ ucwords('hari') }}</option>
            <option value="month">{{ ucwords('bulan') }}</option>
            <option value="year">{{ ucwords('tahun') }}</option>
          </select>
          <input type="submit" id="submit" class="d-none">
          {{-- <button class="form-control btn btn-success text-capitalize text-center fw-bolder mb-0">muat</button> --}}
        </div>
      </form>
      <div class="row">

        @foreach ($report as $item)
        <div class="col-12 col-lg-4 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $item->label }}</p>
                    <h5 class="font-weight-bolder">
                      {{ $item->total }}
                    </h5>
                    <p class="mb-0">
                      <span class="text-sm font-weight-bolder @if ($item->different < 0 || $item->different == 0)
                        text-danger
                      @else
                        text-success
                      @endif">@if ($item->different < 0)
                        {{ $item->different }}
                      @else
                        {!! '+'.$item->different !!}
                      @endif</span>
                      dari {{ $item->label }} sebelumnya
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape {{ $item->color }} shadow-primary text-center rounded-circle">
                    <div class="text-lg text-light opacity-10 pt-2">
                      <svg xmlns="http://www.w3.org/2000/svg" height="22" fill="currentColor" class="bi" viewBox="0 0 16 16">
                        {!! $item->icon !!}
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="row mt-4">
        <div class="col-12 col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">responden berdasarkan jenis kelamin</h6>
              <p class="text-sm mb-0">
                <i class="fa @if ($report->total->different > 0)
                  fa-arrow-up text-success
                @elseif($report->total->different == 0)
                text-danger
                @else
                  fa-arrow-down text-danger
                @endif"></i>
                <span class="font-weight-bold">{{ $report->total->different }}</span> pertambahan
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">responden berdasarkan pendidikan</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="education" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('partials.footer.custom')
    </div>
  </main>
</main>

@endsection
