<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
                </div>
                
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 mt-3">

                    <h5 class="text-center mb-5 h1 mt-3">Please Sign In</h5>

                    {{-- Alert --}}
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- End of Alert --}}

                    <form action="/" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Email or Username input -->
                        <div class="form-outline mb-4">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email or Username" name="email"/>
                        </div>
                        {{-- value="{{ old('email') }}" --}}
            
                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password"/>
                        </div>
            
                            <!-- Checkbox -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="checkbox" />
                                <label class="form-check-label" for="checkbox">Show Password</label>
                            </div>
            
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block col-lg-12">Sign in</button>
            
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>
            
                        <a class="btn btn-primary btn-lg btn-block col-lg-12" style="background-color: #55acee" href="#!" role="button">
                            <i class="fab fa-twitter me-2"></i>Sign Up
                        </a>
            
                    </form>
                </div>
            </div>
        </div>
    </section>

    

    {{-- Bootsrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery --}}
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>