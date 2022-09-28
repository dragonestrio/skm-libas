<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="referrer" content="origin" />
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="{{ $author }}" />
    <title>{{ $app }} - {{ $title }} </title>
    
    {{-- Favicon  --}}
    <link rel="icon" type="image/x-icon" href="{{ url('media/logo/cropped-kepolisian-negara-republik-indonesia-logo-483CE3543A-seeklogo.com_-180x180.png') }}" />
    {{-- ./Favicon --}}

    {{-- CSS --}}
    @include('layouts.css')
    {{-- ./CSS --}}
</head>

<body id="body" class="g-sidenav-show  bg-gray-100">
    {{-- Header --}}

    {{-- @include('partials.navbar.custom') --}}
    {{-- @include('partials.sidebar.custom') --}}
    {{-- <div class="d-none d-lg-block" style="height: 55px;">&nbsp;</div> --}}
    @include('layouts.notif')
    {{-- ./Header --}}

    {{-- Content --}}
    {{-- <div class="mt-3"></div> --}}
    @yield('app')
    {{-- <br> --}}
    {{-- ./Content --}}

    {{-- Footer --}}
    {{-- @include('partials.footer.normal') --}}
    {{-- ./Footer --}}

    {{-- Popup --}}
    {{-- @include('partials.popup.normal') --}}
    {{-- ./Popup --}}

    {{-- // JS --}}
    @include('layouts.js')
    {{-- // ./JS --}}
</body>

</html>