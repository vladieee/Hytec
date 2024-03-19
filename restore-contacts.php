<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once("includes/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];
        // Update operation   
        $sql = "UPDATE contacts SET isDeleted = 'no' WHERE contacts_ID = ?";   
        $stmt = $con->prepare($sql);
        $stmt->execute([$contact_id]);
        $status = "Data restored";

        
        if ($stmt->execute()) {
            // restoration successful
            header("Location:  contacts-list-archived.php?status=Data restored");
            exit();
        } else {
            // restoration failed
            header("Location:  contacts-list-archived.php?status=error");
            exit();
        }
    } else {
        // Redirect if accessed directly
        header("Location: contacts-list-archived.php");
        exit();
    }
?>




