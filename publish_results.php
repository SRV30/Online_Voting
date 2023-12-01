<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Election Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .manage-form {
            max-width: 400px;
            margin: auto;
        }

        .manage-btn {
            margin-top: 10px;
        }

        .publish-btn {
            background-color: #28a745;
            color: #fff;
        }

        .publish-btn:hover {
            background-color: #218838;
        }

        .unpublish-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .unpublish-btn:hover {
            background-color: #c82333;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
            margin-top: 10px;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mt-3">Manage Election Results</h2>

        <div class="manage-form">
            <?php
            // Include the database connection file
            include "connection.php";

            // Check if results are already published
            $checkResultsPublishedQuery = "SELECT results_published FROM elections LIMIT 1";
            $resultsPublishedResult = mysqli_query($connection, $checkResultsPublishedQuery);
            $resultsPublishedRow = mysqli_fetch_assoc($resultsPublishedResult);
            $resultsPublished = $resultsPublishedRow['results_published'];

            if ($resultsPublished) {
                echo '<div class="success-message">Election results are published.</div>';
                echo '<form action="manage_results.php" method="post" class="mt-3">';
                echo '<button type="submit" name="unpublish" class="btn btn-danger unpublish-btn manage-btn">Unpublish Results</button>';
                echo '</form>';
            } else {
                echo '<div class="error-message">Election results are not published.</div>';
                echo '<form action="manage_results.php" method="post" class="mt-3">';
                echo '<button type="submit" name="publish" class="btn btn-success publish-btn manage-btn">Publish Results</button>';
                echo '</form>';
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['publish'])) {
                    // Set results_published to true
                    $updateResultsQuery = "UPDATE elections SET results_published = 1 LIMIT 1";
                    $updateResultsResult = mysqli_query($connection, $updateResultsQuery);

                    if ($updateResultsResult) {
                        echo '<div class="success-message mt-3">Election results have been published successfully.</div>';
                    } else {
                        echo '<div class="error-message mt-3">Error publishing election results. Please try again.</div>';
                    }
                } elseif (isset($_POST['unpublish'])) {
                    // Set results_published to false
                    $updateResultsQuery = "UPDATE elections SET results_published = 0 LIMIT 1";
                    $updateResultsResult = mysqli_query($connection, $updateResultsQuery);

                    if ($updateResultsResult) {
                        echo '<div class="success-message mt-3">Election results have been unpublished successfully.</div>';
                    } else {
                        echo '<div class="error-message mt-3">Error unpublishing election results. Please try again.</div>';
                    }
                }
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
