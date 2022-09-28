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
                <form action="{{ (isset($users)) ? url('users/'.$users->id) : url('users') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    @if (isset($users))
                        @method('put')
                    @endif
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">email</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                            @enderror" value="{{ (old('email') != null) ? old('email') : (isset($users) ? $users->email : '') }}" required autofocus>
                            @error('email')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">nama</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                            @enderror" value="{{ (old('name') != null) ? old('name') : (isset($users) ? $users->name : '') }}" required>
                            @error('name')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">nomor telepon</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="number" name="phone" class="form-control @error('phone')
                            is-invalid
                            @enderror" value="{{ (old('phone') != null) ? old('phone') : (isset($users) ? $users->phone : '') }}" required>
                            @error('phone')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">jenis kelamin</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <select name="gender" class="form-control @error('gender')
                            is-invalid
                            @enderror" required>
                                
                                @if (old('gender') != null)
                                    @switch(old('gender'))
                                        @case('L')
                                            <option value="L">Laki-laki</option>    
                                            @break
                                        @case('P')
                                            <option value="P">Perempuan</option>    
                                            @break
                                        @default
                                            
                                    @endswitch
                                @else
                                    @if (isset($users))
                                    @switch($users->gender)
                                        @case('L')
                                            <option value="L">Laki-laki</option>    
                                            @break
                                        @case('P')
                                            <option value="P">Perempuan</option>    
                                            @break
                                        @default
                                            
                                    @endswitch
                                        
                                    @endif
                                @endif
                                <option value="L">Laki-laki</option>    
                                <option value="P">Perempuan</option>    
                            </select>
                            @error('gender')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror    
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">tanggal lahir</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="date" name="date_born" class="form-control @error('date_born')
                            is-invalid
                            @enderror" value="{{ (old('date_born') != null) ? old('date_born') : (isset($users) ? $users->date_born : '') }}" required>
                            @error('date_born')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">alamat</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <textarea name="address" class="form-control @error('address')
                            is-invalid
                            @enderror" rows="3" required>{{ (old('address') != null) ? old('address') : (isset($users) ? $users->address : '') }}</textarea>
                            @error('address')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror 
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">Foto Profile</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="file" name="profile_pic" class="form-control @error('profile_pic')
                            is-invalid
                            @enderror" accept=".jpg, .jpeg, .png" value="{{ old('profile_pic') }}" {{ (isset($users)) ? '' : 'required' }}>
                            @error('profile_pic')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    @if(auth()->user()->level == 'admin' || auth()->user()->level == 'superadmin')
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">Jabatan</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <select name="level" class="form-control @error('level')
                                is-invalid
                            @enderror">
                            @if (old('level') != null)
                            {!! '<option value="'.old('level').'">'.ucwords(old('level')).'</option>' !!}
                            @else
                            {!! (isset($users)) ? '<option value="'.$users->level.'">'. ucwords($users->level).'</option>' : '' !!}   
                            @endif
                            @can('superadmin')
                            <option value="superadmin">Superadmin</option>    
                            @endcan
                            <option value="admin">Admin</option>    
                            <option value="user">User</option>    
                            </select>
                            @error('level')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endif
    
                    @if ($state != 'update')
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">password</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="password" name="password" class="form-control @error('password')
                            is-invalid
                            @enderror" value="{{ old('password') }}" required>
                            @error('password')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">password konfirmasi</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')
                            is-invalid
                            @enderror" value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
                            <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endif
                </form>
                <div class="row py-5">
                    <div class="col-6 col-lg-6">
                        <button onclick="history.back()" class="btn btn-success bg-gradient-success form-control text-uppercase fw-bold" role="button">kembali</button>
                    </div>
                    <div class="col-6 col-lg-6">
                        <button form="form" class="btn btn-primary bg-gradient-primary form-control text-uppercase fw-bold" role="button">{{ (isset($users)) ? 'perbarui' : 'buat' }}</button>
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
