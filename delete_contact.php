<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];

    // Prepare and execute deletion query
    $sql = "DELETE FROM contacts WHERE contacts_ID = :contact_id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        // Deletion successful
        header("Location:  contacts-list-archived.php?status=Data deleted");
        exit();
    } else {
        // Deletion failed
        header("Location:  contacts-list-archived.php?status=error");
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: contacts-list-archived.php");
    exit();
}
?>
