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
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <?php
    include "connection.php";
    ?>

    <?php
    if (isset($_GET['added'])) {
    ?>
        <div class="alert alert-success my-3" role="alert">
            Candidate has been added successfully.
        </div>
    <?php
    }
    ?>

    <div class="row my-3">
        <div class="col-4">
            <h3>Add New Candidates</h3>
            <form method="POST">
                <div class="form-group">
                    <select class="form-control" name="election_id" required>
                        <option value=""> Select Election </option>
                        <?php
                        $fetchingElections = mysqli_query($connection, "SELECT * FROM elections") or die(mysqli_error($connection));
                        $isAnyElectionAdded = mysqli_num_rows($fetchingElections);
                        if ($isAnyElectionAdded > 0) {
                            while ($row = mysqli_fetch_assoc($fetchingElections)) {
                                $election_id = $row['id'];
                                $election_name = $row['election_topic'];
                                $allowed_candidates = $row['no_of_candidates'];

                                // Now checking how many candidates are added in this election 
                                $fetchingCandidate = mysqli_query($connection, "SELECT * FROM candidate_details WHERE election_id = '" . $election_id . "'") or die(mysqli_error($connection));
                                $added_candidates = mysqli_num_rows($fetchingCandidate);

                                if ($added_candidates < $allowed_candidates) {
                        ?>
                                    <option value="<?php echo $election_id; ?>"><?php echo $election_name; ?></option>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <option value=""> Please add election first </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="candidate_name" placeholder="Candidate Name" class="form-control" required />
                </div>
                <div class="form-group">
                    <input type="text" name="candidate_details" placeholder="Candidate Details" class="form-control" required />
                </div>
                <input type="submit" value="Add Candidate" name="addCandidateBtn" class="btn btn-success" />
            </form>
        </div>

        <div class="col-8">
            <h3>Candidate Details</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Election</th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetchingData = mysqli_query($connection, "SELECT * FROM candidate_details") or die(mysqli_error($connection));
                    $isAnyCandidateAdded = mysqli_num_rows($fetchingData);

                    if ($isAnyCandidateAdded > 0) {
                        $sno = 1;
                        while ($row = mysqli_fetch_assoc($fetchingData)) {
                            $election_id = $row['election_id'];
                            $fetchingElectionName = mysqli_query($connection, "SELECT * FROM elections WHERE id = '" . $election_id . "'") or die(mysqli_error($connection));
                            $execFetchingElectionNameQuery = mysqli_fetch_assoc($fetchingElectionName);
                            $election_name = $execFetchingElectionNameQuery['election_topic'];
                    ?>
                            <tr>
                                <td><?php echo $sno++; ?></td>
                                <td><?php echo $row['candidate_name']; ?></td>
                                <td><?php echo $row['candidate_details']; ?></td>
                                <td><?php echo $election_name; ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning"> Edit </a>
                                    <a href="#" class="btn btn-sm btn-danger"> Delete </a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5"> No any candidate is added yet. </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    if (isset($_POST['addCandidateBtn'])) {
        $election_id = mysqli_real_escape_string($connection, $_POST['election_id']);
        $candidate_name = mysqli_real_escape_string($connection, $_POST['candidate_name']);
        $candidate_details = mysqli_real_escape_string($connection, $_POST['candidate_details']);
        $inserted_by = $_SESSION['username'];
        $inserted_on = date("Y-m-d");

        // inserting into db
        mysqli_query($connection, "INSERT INTO candidate_details(election_id, candidate_name, candidate_details, inserted_by, inserted_on) VALUES('" . $election_id . "', '" . $candidate_name . "', '" . $candidate_details . "', '" . $inserted_by . "', '" . $inserted_on . "')") or die(mysqli_error($connection));

        echo "<script> location.assign('index.php?addCandidatePage=1&added=1'); </script>";
    }
    ?>

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