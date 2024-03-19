<?php

require_once("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];
    $contactId = $_POST["contactId"]; // Retrieve contactId if provided
    $status = "";
    $isDeleted = "no";

    if (!empty($contactId)) {
        // Update operation
        $sql = "UPDATE contacts SET fName = ?, lName = ?, eMail = ?, cNum = ?, isDeleted = ? WHERE contacts_ID = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email, $contactNumber, $isDeleted, $contactId]);
        $status = "Data updated";
    } else {
        // Insert operation
        $sql = "INSERT INTO contacts (fName, lName, eMail, cNum, isDeleted) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email, $contactNumber, $isDeleted]);
        $status = "Data added";
    }

    // Redirect back to the page with a success or error message
    if ($stmt->rowCount() > 0) {
        header("Location: contacts.php?status=". $status ."");
        exit();
    } else {
        header("Location: contacts.php?status=error");
        exit();
    }
}
?>
