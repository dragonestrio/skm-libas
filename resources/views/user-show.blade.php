@extends('layouts.template')
@section('app')

<div class="container-fluid">
    <div class="row">
        {{-- {{ dd($langs) }} --}}
        <div class="col-sm-12">
            <p class="text-capitalize m-0 p-0">hello, my name is {{ $users->name }}</p>
            @foreach ($users->langs as $langs)
            <p class="text-capitalize">my primary language is {{ $langs->name }}</p>
            @endforeach
        </div>
    </div>
</div>

@endsection
