
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <section class="nav-content">
      <nav class="navbar navbar-skm ">
        <div class="container-fluid">
          <div class="logo gap-4">
            <a class="link-logo" href="{{ url('/') }}">
              <img src="{{ url('media/logo/logo.png') }}" class="" alt="">
            </a>
            <a class="link link-light fw-bold" href="{{ url('/') }}">POLRESTABES SEMARANG</a>
          </div>
          <div class="d-flex">
            <ul class="navbar-nav mb-lg-0 menu link ">
              <li class="nav-item">
                <a class="nav-link text-white " aria-current="page" href="{{ url('/') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('survey') }}">Survey</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap');

      body {
        font-family: 'Poppins', sans-serif;
      }
        .logo {
        display: flex;
        align-items: center;
        width: 12rem;
        }

        .logo img{
            width: 100%;
        }
        .logo p > a{
          color: #ffffff;
          text-align: left;
        }
        .link {
          color: white;
          text-decoration: none;
          text-align: left
        }
        .navbar-skm {
            padding: 1rem 10rem;
            background-color: #343434;
        }
        .menu {
          display: flex;
          flex-direction: row;
          font-size: 18px;
          font-weight:500;
        }
        .menu li {
          margin-left: 2rem;
        }
        .link-logo {
        width: auto;
      }

      /* Extra small devices (phones, 600px and down) */
      @media only screen and (max-width: 600px) {
        .navbar-skm {
            padding: 1rem 4rem;
            background-color: #343434;
        }
      }

      /* Small devices (portrait tablets and large phones, 600px and up) */
      @media only screen and (min-width: 600px) {
        .navbar-skm {
          padding: 1rem 2rem;
        }
        .menu {
          font-size: 1rem;
        }
        .menu li {
          margin-left: 1.4rem;
        }
        .link {
          font-size: 16px;
        }
        .logo img {
          width: 100%
        }
        .logo {
          width: 13rem;
        }
      }

      /* Medium devices (landscape tablets, 768px and up) */
      @media only screen and (min-width: 768px) {
        .navbar-skm {
          padding: 1rem 4rem ;
        }
        .menu {
          font-size: 1.1rem;
        }
        .menu li {

        }
        .link {
            font-size: 18px;
        }
        .logo {
          width: 14rem;
        }
      }

      /* Large devices (laptops/desktops, 992px and up) */
      @media only screen and (min-width: 992px) {
        .navbar-skm {
          padding: 1rem 6rem;
        }
      }

      @media only screen and (min-width: 1200px) {
        .navbar-skm {
            padding: 1rem 10rem;
        }
        .menu {
          font-size: 18px;
        }
        .menu li {
          margin-left: 2rem;
        }
        .link {
            font-size: 17px;
        }
        .logo {
          width: 14rem;
        }
      }

    </style>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
