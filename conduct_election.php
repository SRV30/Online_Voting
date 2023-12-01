<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        iELECTION - Online election organising, conductiong and giving vote.
    </title>
    <style>
        .result{
            background-color: yellow;
            text-align: center;
            color: red;
        }
    </style>
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
                            <a href="logout.php">Logout</a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>



        <?php
        if (isset($_GET['added'])) {
        ?>
            <div class="alert alert-success my-3" role="alert">
                Election has been added successfully.
            </div>
        <?php
        } else if (isset($_GET['delete_id'])) {
            $d_id = $_GET['delete_id'];
            mysqli_query($connection, "DELETE FROM elections WHERE id = '" . $d_id . "'") or die(mysqli_error($connection));
        ?>
            <div class="alert alert-danger my-3" role="alert">
                Election has been deleted successfully!
            </div>
        <?php

        }
        ?>




        <div class="row my-3">
            <div class="col-4">
                <h3>Add New Election</h3>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="election_topic" placeholder="Elction Topic" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input type="number" name="number_of_candidates" placeholder="No of Candidates" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input type="text" onfocus="this.type='Date'" name="starting_date" placeholder="Starting Date" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input type="text" onfocus="this.type='Date'" name="ending_date" placeholder="Ending Date" class="form-control" required />
                    </div>
                    <input type="submit" value="Add Elction" name="addElectionBtn" class="btn btn-success" />
                </form>
            </div>

            <div class="col-8">
                <h3>Upcoming Elections</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Election Name</th>
                            <th scope="col">No. of Candidates</th>
                            <th scope="col">Starting Date</th>
                            <th scope="col">Ending Date</th>
                            <th scope="col">Status </th>
                            <th scope="col">Action </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include "connection.php";


                        $fetchingData = mysqli_query($connection, "SELECT * FROM elections") or die(mysqli_error($connection));
                        $isAnyElectionAdded = mysqli_num_rows($fetchingData);

                        if ($isAnyElectionAdded > 0) {
                            $sno = 1;
                            while ($row = mysqli_fetch_assoc($fetchingData)) {
                                $election_id = $row['id'];
                        ?>
                                <tr>
                                    <td><?php echo $sno++; ?></td>
                                    <td><?php echo $row['election_topic']; ?></td>
                                    <td><?php echo $row['no_of_candidates']; ?></td>
                                    <td><?php echo $row['starting_date']; ?></td>
                                    <td><?php echo $row['ending_date']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="add_candidates.php?election_id=<?php echo $election_id; ?>"> Add Candidates </a>
                                    </td>

                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7"> No any election is added yet. </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <script>
            const DeleteData = (e_id) => {
                let c = confirm("Are you really want to delete it?");

                if (c == true) {
                    location.assign("index.php?addElectionPage=1&delete_id=" + e_id);
                }
            }
        </script>

        <?php

        if (isset($_POST['addElectionBtn'])) {
            $election_topic = mysqli_real_escape_string($connection, $_POST['election_topic']);
            $number_of_candidates = mysqli_real_escape_string($connection, $_POST['number_of_candidates']);
            $starting_date = mysqli_real_escape_string($connection, $_POST['starting_date']);
            $ending_date = mysqli_real_escape_string($connection, $_POST['ending_date']);
            $inserted_by = $_SESSION['username'];
            $inserted_on = date("Y-m-d");


            $date1 = date_create($inserted_on);
            $date2 = date_create($starting_date);
            $diff = date_diff($date1, $date2);


            if ((int)$diff->format("%R%a") > 0) {
                $status = "InActive";
            } else {
                $status = "Active";
            }

            // inserting into db
            mysqli_query($connection, "INSERT INTO elections(election_topic, no_of_candidates, starting_date, ending_date, status, inserted_by, inserted_on) VALUES('" . $election_topic . "', '" . $number_of_candidates . "', '" . $starting_date . "', '" . $ending_date . "', '" . $status . "', '" . $inserted_by . "', '" . $inserted_on . "')") or die(mysqli_error($connection));

        ?>
            <script>
                location.assign("index.php?addElectionPage=1&added=1");
            </script>

        <?php

        }

        ?>
<br>
        <div class="result">
            <h3><a href="publish_results.php">Publish Result</a></h3>
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