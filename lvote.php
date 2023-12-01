<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        iELECTION - Online election organising, conductiong and giving vote.
    </title>
    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/asignup.css" />
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
                    <!-- Add this where you want the logout link/button to appear, such as in your header -->
                    

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
                            <a href="logout.php">Logout</a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container mt-5">
            <h2>Vote for Your Preferred Candidate</h2>

            <?php
            session_start(); // Start the session

            // Include the database connection file
            include "connection.php";

            // Check if the form is submitted and a voter is logged in
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['email'])) {
                // Process the submitted vote
                // Add this line just before mysqli_query

                $voter_id = $_SESSION['email'];
                $candidate_id = mysqli_real_escape_string($connection, $_POST['candidate_id']);



                $check_candidate_query = "SELECT id FROM candidate_details WHERE id = '$candidate_id'";
                $check_candidate_result = mysqli_query($connection, $check_candidate_query);

                // Insert the vote into the database (assuming you have a table named votes)
                $query = "INSERT INTO votes (voter_id, candidate_id) VALUES ('$voter_id', '$candidate_id')";
                // Debugging: Print the query
                $result = mysqli_query($connection, $query);

                if ($result) {
                    echo '<div class="alert alert-success my-3" role="alert">
                Your vote has been recorded successfully.
              </div>';
                } else {
                    echo '<div class="alert alert-danger my-3" role="alert">
                Error recording your vote. Please try again.
              </div>';
                }
            }

            // Fetch the list of candidates from the database
            $candidates_query = "SELECT * FROM candidate_details";
            $candidates_result = mysqli_query($connection, $candidates_query);

            // Assuming you have fetched the correct candidate_id from the form
            $candidate_id = isset($_POST['candidate_id']) ? mysqli_real_escape_string($connection, $_POST['candidate_id']) : null;

            // Check if the user has already voted
            $check_vote_query = "SELECT * FROM votes WHERE voter_id = '$voter_id'";
            $check_vote_result = mysqli_query($connection, $check_vote_query);

            if (mysqli_num_rows($check_vote_result) > 0) {
                echo '<div class="alert alert-danger my-3" role="alert">
            You have already voted. Multiple votes are not allowed.
          </div>';
            } else {
                // Verify if the candidate_id exists in candidate_details
                $check_candidate_query = "SELECT id FROM candidate_details WHERE id = '$candidate_id'";
                $check_candidate_result = mysqli_query($connection, $check_candidate_query);

                if (mysqli_num_rows($check_candidate_result) > 0) {
                    // The candidate_id exists, proceed with the vote insertion
                    $query = "INSERT INTO votes (voter_id, candidate_id) VALUES ('$voter_id', '$candidate_id')";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        // Set a session variable indicating that the user has voted
                        $_SESSION['has_voted'] = true;

                        echo '<div class="alert alert-success my-3" role="alert">
                    Your vote has been recorded successfully.
                  </div>';
                    } else {
                        echo '<div class="alert alert-danger my-3" role="alert">
                    Error recording your vote. Please try again.
                  </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger my-3" role="alert">
                
              </div>';
                }
            }

            ?>

            <form method="POST">
                <div class="form-group">
                    <label for="candidate_id">Select Candidate:</label>
                    <select class="form-control" name="candidate_id" required>
                        <option value="">Select Candidate</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($candidates_result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['candidate_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Vote</button>
            </form>
        </div>

        <?php
        // Close the database connection
        mysqli_close($connection);
        ?>

        <h3><a href="result.php">View Result</a></h3>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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