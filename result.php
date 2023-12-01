<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Election Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .candidate-progress {
            margin-bottom: 20px;
        }

        .progress-bar {
            background-color: #007bff;
        }

        .winner {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mt-3">Election Results</h2>

        <?php
        // Include the database connection file
        include "connection.php";

        // Check if the results are published
        $checkResultsPublishedQuery = "SELECT results_published FROM elections LIMIT 1";
        $resultsPublishedResult = mysqli_query($connection, $checkResultsPublishedQuery);
        $resultsPublishedRow = mysqli_fetch_assoc($resultsPublishedResult);
        $resultsPublished = $resultsPublishedRow['results_published'];

        // If results are published, allow voters to view them
        if ($resultsPublished) {
            // Fetch and display results (similar to the previous example)
            $totalVotesQuery = "SELECT COUNT(*) as totalVotes FROM votes";
            $totalVotesResult = mysqli_query($connection, $totalVotesQuery);
            $totalVotesRow = mysqli_fetch_assoc($totalVotesResult);
            $totalVotes = $totalVotesRow['totalVotes'];

            $candidatesQuery = "SELECT id, candidate_name FROM candidate_details";
            $candidatesResult = mysqli_query($connection, $candidatesQuery);

            // Track the winner
            $winnerPercentage = 0;
            $winnerCandidate = '';

            // Display the stylish progress bar for each candidate
            while ($candidate = mysqli_fetch_assoc($candidatesResult)) {
                $candidateId = $candidate['id'];

                $candidateVotesQuery = "SELECT COUNT(*) as votes FROM votes WHERE candidate_id = '$candidateId'";
                $candidateVotesResult = mysqli_query($connection, $candidateVotesQuery);
                $candidateVotesRow = mysqli_fetch_assoc($candidateVotesResult);
                $candidateVotes = $candidateVotesRow['votes'];

                $percentage = ($totalVotes > 0) ? round(($candidateVotes / $totalVotes) * 100, 2) : 0;

                // Update the winner information if needed
                if ($percentage > $winnerPercentage) {
                    $winnerPercentage = $percentage;
                    $winnerCandidate = $candidate['candidate_name'];
                }

                // Display the stylish progress bar
                echo '<div class="candidate-progress">';
                echo '<h4>' . $candidate['candidate_name'] . '</h4>';
                echo '<div class="progress">';
                echo '<div class="progress-bar" role="progressbar" style="width: ' . $percentage . '%" aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100">';
                echo $percentage . '%';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            // Display the winner
            echo '<div class="mt-3">';
            if (!empty($winnerCandidate)) {
                echo '<p class="winner">Winner: ' . $winnerCandidate . ' (' . $winnerPercentage . '%)</p>';
            } else {
                echo '<p>No winner declared.</p>';
            }
            echo '</div>';

        } else {
            // Results are not published
            echo '<div class="alert alert-warning mt-3" role="alert">
                    Election results are not yet published. Please check back later.
                  </div>';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
