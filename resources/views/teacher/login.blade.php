
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GGAST</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('assets/1/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/1/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/1/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/1/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h5>Welcome! Let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="POST" action="{{ route('teacher.login') }}" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="email" class="form-control p_input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control p_input @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                   <button type="submit" class="btn btn-primary btn-block enter-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-google auth-form-btn">
                    <i class="mdi mdi-google mr-2"></i>Connect using Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('assets/1/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/1/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/1/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/1/js/template.js')}}"></script>
  <script src="{{asset('assets/1/js/settings.js')}}"></script>
  <script src="{{asset('assets/1/js/todolist.js')}}"></script>
</body>
</html>
