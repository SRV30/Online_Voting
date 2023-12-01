<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>iELECTION - Online election organising, conductiong and giving vote.</title>
  <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
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
          <a class="navbar-brand" href="http://localhost/project/front.html">Home</a>
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
                  <li><a class="dropdown-item" href="vlogin.html">Voter Login</a></li>
                  <li><a class="dropdown-item" href="http://localhost/project/orgsignup.html">Organisation Registration</a></li>
                </ul>
              </div>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                <?php
                }
                ?>

              </ul>
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
    <div class="main1">
      <div class="slider-container">
        <div class="slider">
          <div class="slide">
            <img src="img/banner1.jpeg" alt="Image 1" />
          </div>
          <div class="slide">
            <img src="img/banner2.jpeg" alt="Image 2" />
          </div>
          <div class="slide"><img src="img/banner3.jpeg" alt="Image 3" /></div>
          <div class="slide">
            <img src="img/banner4.jpg" alt="Image 4" />
          </div>
          <div class="slide">
            <img src="img/banner5.jpeg" alt="Image 5" />
          </div>
        </div>
      </div>
      <div class="left_right">
        <button onclick="prevSlide()"> ⬅ </button>
        <button onclick="nextSlide()"> ➡ </button>
      </div>
    </div>

    <div class="main2">
      <p><u>News</u></p>
      <div class="news-marquee">

        <div class="news-content">
          <li>Pandemic-Driven Shift: The COVID-19 pandemic accelerated the adoption of online voting and remote election processes in many countries. Concerns about in-person voting during the pandemic prompted the exploration of online alternatives.</li>
        </div>
        <div class="news-content">
          <li>
            Blockchain Voting: Some jurisdictions started exploring blockchain technology for secure and transparent online voting. Blockchain can enhance the security and integrity of election processes.
          </li>
        </div>
        <div class="news-content">
          <li>
            Secure and Convenient Electronic Voting System Paves the Way for
            Increased Civic Engagement.
          </li>
        </div>
        <div class="news-content">
          <li>
            Online Voting Revolutionizes Democracy: A New Era in Electoral
            Participation
          </li>
        </div>

      </div>
    </div>

    <div class="main3">
      <div class="cand-login">
        <div class="container">
          <h2><u><b>Voter Login</b></u></h2>
          <form id="loginForm" action="php/vlogin.php" method="post">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" id="email" name="email" required placeholder="Email address">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" required placeholder="Email address">
            </div>
            <div class="form-group">
              <label for="votingCode">Election Voting Code:</label>
              <input type="text" id="votingCode" name="votingCode" required placeholder="Enter the code">
            </div>
            <button type="submit">Login</button>
          </form>
        </div>
      </div>

      <div class="main-video">
        <div class="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/to324JIljf8?si=T42IurVFOErPLm-W" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" align="right" allowfullscreen></iframe>
        </div>
      </div>


    </div>
  </main>

  <footer>
    <div class="foot-panel"><a href="#" class="back-to-top" id="backToTop">Back to Top</a></div>

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
        <a href="http://localhost/project/organlogin.html">Organisation Login</a>
      </ul>
    </div>

    <div class="footer-copy">
      <p>&copy; 2023 iELECTION</p>
    </div>
  </footer>

  <script src="js/1.js"></script>
</body>

</html>