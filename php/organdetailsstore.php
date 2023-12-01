<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logo = $_FILES["logo"]["tmp_name"];
    $organizationDetails = $_POST["organizationDetails"];
    $establishmentDate = $_POST["establishmentDate"];
    $organizationId = $_POST["oid"];

    // You may need to sanitize and validate the input data

    // Assuming your organdetails table has columns: logo, other_details, establishment_date
    $query = "INSERT INTO organdetails (organization_id, logo, detail, establishdate) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sbss",$organizationId, $logo, $organizationDetails, $establishmentDate);


    if ($stmt->execute()) {
        echo "Organization details stored successfully.";

    } else {
        echo "Error storing organization details: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
