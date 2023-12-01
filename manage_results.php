<?php
// Include the database connection file
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['publish'])) {
        // Set results_published to true
        $updateResultsQuery = "UPDATE elections SET results_published = 1 LIMIT 1";
        $updateResultsResult = mysqli_query($connection, $updateResultsQuery);

        if ($updateResultsResult) {
            echo '<div class="alert alert-success mt-3" role="alert">
                    Election results have been published successfully.
                
                  </div>';
                  echo '<form action="conduct_election.php" method="post" class="mt-3">';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">
                    Error publishing election results. Please try again.
                  </div>';
        }
    } elseif (isset($_POST['unpublish'])) {
        // Set results_published to false
        $updateResultsQuery = "UPDATE elections SET results_published = 0 LIMIT 1";
        $updateResultsResult = mysqli_query($connection, $updateResultsQuery);

        if ($updateResultsResult) {
            echo '<div class="alert alert-success mt-3" role="alert">
                    Election results have been unpublished successfully.
                  </div>';
                  echo '<form action="conduct_election.php" method="post" class="mt-3">';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">
                    Error unpublishing election results. Please try again.
                  </div>';
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>
