<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SIPEDES</title>

    {{-- Include CSS --}}
    @include('layouts.admin.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- Header --}}
    @include('layouts.admin.header')

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    {{-- Main Content --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    @include('layouts.admin.footer')
</div>

{{-- Include JS --}}
@include('layouts.admin.js')
</body>
</html>
