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
    <div class="container-fluid py-4 text-dark">
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="row pt-4">
              <div class="col-12 col-lg-12 py-3 px-5">
                @switch($state)
                    @case('update')
                        <h4 class="text-center text-capitalize fw-bolder">perbarui {{ $position }}</h4>
                        @break
                    @case('create')
                        <h4 class="text-center text-capitalize fw-bolder">tambah {{ $position }}</h4>
                        @break
                    @default
                        
                @endswitch
              </div>
              <div class="col-12 col-lg-12 py-3 px-5">
                <form action="{{ (isset($report)) ? url('reports/'.$report->id) : url('reports') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    @if (isset($report))
                        @method('put')
                    @endif
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">Pertanyaan</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <select name="question_id" class="form-control @error('question_id')
                                is-invalid
                            @enderror">
                              @if (old('question_id') != null)
                                <?php $question_recent_name = $question->where('id', old('question_id'))->first()->name; ?>
                                <option value="{{ old('question_id') }}">{{ ucwords($question_recent_name) }}</option>
                              @else
                                @if (isset($report))
                                  <?php $question_recent_name = $question->where('id', $report->question_id)->first()->name; ?>
                                  <option value="{{ $report->question_id }}">{{ ucwords($question_recent_name) }}</option>  
                                @endif
                              @endif

                            @foreach ($question as $item)
                            <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                            @endforeach
                            </select>

                            @error('question_id')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">User</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <select name="user_id" class="form-control @error('user_id')
                                is-invalid
                            @enderror">
                            @if (old('user_id') != null)
                            <?php $users_recent_name = $users->where('id', old('user_id'))->first()->name; ?>
                            {!! '<option value="'.old('user_id').'">'.ucwords($users_recent_name).'</option>' !!}
                            @else
                            @if (isset($report))
                            <?php $users_recent_name = $users->where('id', $report->user_id)->first()->name; ?>
                            <option value="{{ $report->user_id }}">{{ ucwords($users_recent_name) }}</option>  
                            @endif
                            @endif
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                            @endforeach
                            </select>
                            @error('user_id')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">result</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="number" name="result" class="form-control @error('result')
                            is-invalid
                            @enderror" value="{{ (old('result') != null) ? old('result') : (isset($report) ? $report->result : '') }}" required autofocus>
                            @error('result')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </form>
                <div class="row py-5">
                    <div class="col-6 col-lg-6">
                        <button onclick="history.back()" class="btn btn-success bg-gradient-success form-control text-uppercase fw-bold" role="button">kembali</button>
                    </div>
                    <div class="col-6 col-lg-6">
                        <button form="form" class="btn btn-primary bg-gradient-primary form-control text-uppercase fw-bold" role="button">{{ (isset($report)) ? 'perbarui' : 'buat' }}</button>
                    </div>
                </div>

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
