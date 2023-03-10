<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">{{ __('Loading...') }}</span>
            </div>
        </div>
        {{-- @dd(auth()->user()->profile) --}}
        <div class="sidebar pe-4 pb-3">

            <nav class="navbar bg-white navbar-light">
                <a href="{{ route('index') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ __('DASHMIN') }}</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="position-relative">
                        @php
                            if (!isset(auth()->user()->profile->avatar)) {
                                echo '<img src="'.asset("img/user.jpg").'" class="rounded-circle" style="width:50px;;border: 1px solid">';
                            } else {
                                echo '<img src="uploads/' . auth()->user()->profile->avatar . '" style="width:50px;border: 1px solid" class="rounded-circle">';
                            }
                        @endphp
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ optional(auth()->user())->name }}</h6>
                        <span>
                            @php
                                if (optional(auth()->user())->role == 1) {
                                    echo 'Admin';
                                }
                                
                            @endphp
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100 hy-500">
                    <a href="{{ route('index') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>{{ __('Dashboard') }}</a>
                    <a href="{{ route('admin.user') }}" class="nav-item nav-link active"><i
                            class="fa fa-user me-2"></i>{{ __('Users') }}</a>
                    <a href="{{ route('admin.product') }}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>{{ __('Products') }}</a>
                    <a href="{{ route('admin.category') }}" class="nav-item nav-link"><i
                            class="fa fa-store me-2"></i>{{ __('Categories') }}</a>
                    <a href="{{ route('admin.order') }}" class="nav-item nav-link"><i
                            class="fa fa-clipboard"></i>{{ __('Order') }}</a>
                </div>
            </nav>
        </div>

        <div class="content">

            <nav class="navbar navbar-expand px-4 py-1">
                <a href="" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-1" type="search" placeholder="Search" name="keyword"
                        value="{{ request()->keyword }}">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                            @php
                                if (!isset(auth()->user()->profile->avatar)) {
                                    echo '<img src="'.asset("img/user.jpg").'" style="width:50px;border: 1px solid" class="rounded-circle">';
                                } else {
                                    echo '<img src="uploads/' . auth()->user()->profile->avatar . '" style="width:50px;border: 1px solid" class="rounded-circle">';
                                }
                            @endphp
                            <span class="d-none d-lg-inline-flex">{{ optional(auth()->user())->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('My Profile') }}</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" class="dropdown-item" value="Logout">
                            </form>

                        </div>
                    </div>
                </div>
            </nav>
            <div style="width: 100%; height: 10px; background-color: #f3f6f9"></div>
            <div class="container-fluid pt-4 px-4 ">
                @yield('content')

            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: '---Category---'
            });

        });
    </script>


    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
