@extends('layouts.template')
@section('app')

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="py-5 py-lg-5">
            <div class="px-auto">
                <div class="container">
                    <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="pb-5">
                            <h3 class="text-center text-uppercase fw-bold">register</h3>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">email</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="email" name="email" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light @error('email')
                                is-invalid
                                @enderror" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">nama</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="text" name="name" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light @error('name')
                                is-invalid
                                @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">nomor telepon</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="number" name="phone" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light @error('phone')
                                is-invalid
                                @enderror" value="{{ old('phone') }}" required>
                                @error('phone')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">jenis kelamin</p>
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
                                <p class="text-capitalize fs-5 p-0 m-0">tanggal lahir</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="date" name="date_born" class="form-control @error('date_born')
                                is-invalid
                                @enderror" value="{{ old('date_born') }}" required>
                                @error('date_born')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">alamat</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <textarea name="address" class="form-control @error('address')
                                is-invalid
                                @enderror" rows="3" required>{{ old('address') }}</textarea>
                                @error('address')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror 
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">Foto Profile</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="file" name="profile_pic" class="form-control @error('profile_pic')
                                is-invalid
                                @enderror" accept=".jpg, .jpeg, .png" value="{{ old('profile_pic') }}" required>
                                @error('profile_pic')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">password</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="password" name="password" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light @error('password')
                                is-invalid
                                @enderror" value="{{ old('password') }}" required>
                                @error('password')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">password konfirmasi</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="password" name="password_confirmation" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light @error('password_confirmation')
                                is-invalid
                                @enderror" value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                <p class="p-0 m-0 text-danger text-input-failed">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row py-5">
                            <div class="col-12 col-lg-12">
                                <button class="btn btn-success form-control text-uppercase fw-bold" role="button">register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
