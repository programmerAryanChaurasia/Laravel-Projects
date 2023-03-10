<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Log in</title>

    <!-- Bootstrap -->
    <link
      href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}"
      rel="stylesheet"
    />
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet" />
    <!-- Animate.css -->
    <link href="{{ asset('admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet" />
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ url('admin/login_submit') }}" method="post">
              @csrf
              <h1>Login Form</h1>
              @if (session()->has('message'))
                <div class="alert alert-danger" role="alert">
                  {{ session('message') }}
                </div>
              @endif
              

              <div>
                <input type="email" name="email" class="form-control" placeholder="email" required />
              </div>

              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
              </div>

              <div>
                {{-- <input type="submit" class="btn btn-default submit" name="submit"> --}}
                <button class="btn btn-success">Log in </button>
              </div>
            </form>
          </section>
        </div>  
      </div>
    </div>
  </body>
</html>
