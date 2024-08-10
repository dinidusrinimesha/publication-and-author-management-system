<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Publication and Author Managemet System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<body>
  {{-- Navbar --}}
  <nav class="navbar bg-dark navbar-dark navbar-expand-lg py-3">
    <div class="container">
      <a href="#" class="navbar-brand">Publication and Autho Management System</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('register') }}" class="nav-link">Register</a>
              </li>
          </ul>
      </div>
    </div>
  </nav>

  {{-- Main --}}
  <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h1>Become a <span class="text-warning">Reader</span> !!</h1>

                <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus amet optio deserunt accusantium ut facilis cupiditate rerum sequi! Quas, commodi.</p>

                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register Now</a>
            </div>

            <img class="img-fluid d-none w-50 d-sm-block" src="/images/welcome-img.svg" alt="welcome-img">
        </div>
    </div>
 </section>

 {{-- About Us --}}
 <section class="p-5">
  <div class="container py-5">
    <div class="row align-items-center justify-content-between">
      <div class="col-md">
        <img src="/images/about.svg" alt="about-img" class="w-50">
      </div>
      <div class="col-md">
        <h2 class="text-center py-4">About Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ipsum nisi ratione fugiat eos quo? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, velit.</p>
      </div>
    </div>
  </div>
 </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>