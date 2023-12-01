<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    iELECTION - Online election organising, conductiong and giving vote.
  </title>
  <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/organdetails.css" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <header>
    <div class="nav1">
      <div class="head-img">
        <a href="#"><img src="img/logo.jpeg" /></a>
      </div>

      <div class="head-h1">
        <h1 id="title">iELECTION</h1>
      </div>
    </div>

    <div class="nav2">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <a class="dropdown-item active" href="alogin.html">Admin Login</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="clogin.html">Candidate Login</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="vlogin.html">Voter Login</a>
                  </li>
                </ul>
              </div>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-success" type="submit" style="
                      color: #2d3748;
                      background-color: #ffe60a;
                      border: 3px solid red;
                    ">
                <b>Go</b>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <h2>Organization Details</h2>
      <form action="php/organdetailsstore.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
          <label for="oid" class="form-label">Organization Id:</label>
          <textarea class="form-control" id="organizationDetails" name="oid" required></textarea>
        </div>
        <div class="mb-3">
          <label for="logo" class="form-label">Organization Logo:</label>
          <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
        </div>
        <div class="mb-3">
          <label for="organizationDetails" class="form-label">Organization Details:</label>
          <textarea class="form-control" id="organizationDetails" name="organizationDetails" required></textarea>
        </div>
        <div class="mb-3">
          <label for="establishmentDate" class="form-label">Establishment Date:</label>
          <input type="date" class="form-control" id="establishmentDate" name="establishmentDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </main>

  <footer>
    <div class="foot-panel">
      <a href="#" class="back-to-top" id="backToTop">Back to Top</a>
    </div>

    <div class="foot-panel2">
      <ul>
        <p>Get to Know Us</p>
        <a>Careers</a>
        <a>Blog</a>
        <a>About iElection</a>
      </ul>

      <ul>
        <p>Connect with Us</p>
        <a>Facebook</a>
        <a>Twitter</a>
        <a>Instagram</a>
      </ul>

      <ul>
        <p>How to organise election</p>
        <a>Rule</a>
        <a>Requirements</a>
        <a href="">Organisation Login</a>
        <a>Participating Organisation</a>
      </ul>

      <ul>
        <p>Login & SignUp</p>
        <a href="alogin.html">Admin Login</a>
        <a href="vlogin.html">Voter Login</a>
        <a href="vsignup.html">Voter SignUp</a>
        <a href="clogin.html">Candidate Login</a>
        <a href="csignup.html">Candidate SignUp</a>
        <a href="">Organisation Login</a>
      </ul>
    </div>

    <div class="footer-copy">
      <p>&copy; 2023 iELECTION</p>
    </div>
  </footer>

  <script src="js/asignup.js"></script>
</body>

</html>