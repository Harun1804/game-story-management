<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Game Management</title>
    @include('layouts.includes.header')
    @stack('css-vendor')
    @stack('css-style')
</head>

<body>
    <div id="app">
        @include('layouts.includes.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>@yield('content-title','Dashboard')</h3>
                        </div>
                        @if (Request::segment(1) != 'dashboard')
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('active-route','dasboard')</li>
                                    </ol>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    @yield('content')
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('layouts.includes.footer')
    @stack('js-vendor')
    @stack('js-style')
</body>

</html>
