@include('back.layouts.inc.header')

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home') }}" class="text-reset"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Reset Password</h5>
                                <p class="text-white-50 mb-0">Re-Password with {{ config('app.name') }}.</p>

                                <a href="{{ route('home') }}" class="logo logo-admin mt-4">
                                    <img src="/back/assets/images/logo-sm-dark.png" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">

                                <form class="form-horizontal" method="POST"
                                    action="{{ route('auth.forgot-password.send') }}">
                                    @csrf
                                    @if(session('success'))
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if($errors->any())
                                    <div class="alert alert-danger text-center mb-4" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" name="email"
                                            placeholder="Enter email" required>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <p>Remember It ? <a href="{{ route('auth.login') }}" class="fw-medium text-primary"> Sign In
                                here</a> </p>
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> {{ config('app.name') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    @include('back.layouts.inc.scripts')