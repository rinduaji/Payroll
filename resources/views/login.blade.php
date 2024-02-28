<!DOCTYPE html>
<html lang="en">
<head>
	<title>PayRoll</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = '{{ asset("images/login/payroll.png") }}' type = "image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href='{{ asset("fonts/login/font-awesome-4.7.0/css/font-awesome.min.css") }}'>
    <link rel="stylesheet" type="text/css" href='{{ asset("css/login/bootstrap.min.css") }}'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
</head>
<body class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Pay<span style="color: hsl(218, 81%, 75%)">Roll</span>
        </h1>
        <!-- <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Aplikasi Penggajian
        </p> -->
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="{{route('payroll.loginAdd')}}" method="POST">
              @csrf
              <div class="form-outline mb-5">
                <img src='{{ asset("images/login/payroll.png") }}' class="rounded" width="15%" height="15%"></img>
              </div>

              @if (Session::has('status')) 
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="username" name="username" class="form-control"/>
                <label class="form-label" for="username">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-5">
                <input type="password" id="password" name="password" class="form-control"/>
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- Submit button -->
              <div class="d-grid gap-4">
                <button type="submit" class="btn btn-primary" name="login">
                    Login
                </button>
              <div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  $(".alert").alert('close');
</script>
<!-- Section: Design Block -->
<script src='{{ asset("js/login/bootstrap.bundle.min.js") }}'></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>