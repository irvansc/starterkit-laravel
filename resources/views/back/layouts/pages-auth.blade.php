@include('back.layouts.inc.header')

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="/home" class="text-reset"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50 mb-0">Sign in to continue to </p>
                                <a href="/home" class="logo logo-admin mt-4">
                                    <img src="" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            @yield('content')

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('back.layouts.inc.scripts')
