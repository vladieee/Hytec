<?php
require_once("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];

    if (!empty($contact_id)) {
        // Soft delete operation
        $sql = "UPDATE contacts SET isDeleted = 'yes' WHERE contacts_ID = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$contact_id]);
        
        $status = "Data updated";

        header("Location: contacts.php");
        exit; // Ensure that no further code is executed after the redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include "sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include "navbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Archive Contacts</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                                               
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th> <!-- This is the ID column -->
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th> <!-- This is the ID column -->
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM contacts ORDER BY lName";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :  if ($row['isDeleted'] !== 'no') :
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['contacts_ID'] ?></td>
                                                        <td><?php echo $row['fName'] ?></td>
                                                        <td><?php echo $row['lName'] ?></td>
                                                        <td><?php echo $row['cNum'] ?></td>
                                                        <td><?php echo $row['eMail'] ?></td>
                                                        <td>
                                                            <!-- <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#restoreModal' data-action='edit' data-id="<?php echo $row['contacts_ID']; ?>" data-fname="<?php echo $row['fName']; ?>" data-lname="<?php echo $row['lName'] ?>" data-cnum="<?php echo $row['cNum'] ?>" data-email="<?php echo $row['eMail'] ?>">Restore</button> -->
                                                            <button type='button' class='btn btn-success restore-button' data-bs-toggle='modal' data-bs-target="#restoreModal<?php echo $row['contacts_ID'] ?>">Restore</button>
                                                            <button type='button' class='btn btn-danger delete-button' data-bs-toggle='modal' data-bs-target="#deleteModal<?php echo $row['contacts_ID'] ?>">Delete</button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endif;
                                            ?>
                                            <div class='modal fade' id="restoreModal<?php echo $row['contacts_ID'] ?>" tabindex='-1' aria-labelledby='restoreModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title'>Restore Contact</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' style="background-color:rgba(255,255,255, .1); border:none"><sup style="font-size:15px">x</sup></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <p>Are you sure you want to restore this contact?</p>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                            <form action='restore-contacts.php' method='post' style='display: inline;'>
                                                                <input type='hidden' name='contact_id' value="<?php echo $row['contacts_ID'] ?>" W>
                                                                <button type='submit' class='btn btn-success'>Restore</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal fade' id="deleteModal<?php echo $row['contacts_ID'] ?>" tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title'>Delete Contact</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' style="background-color:rgba(255,255,255, .1); border:none"><sup style="font-size:15px">x</sup></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <p>Are you sure you want to delete this contact?</p>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                            <form action='delete_contact.php' method='post' style='display: inline;'>
                                                                <input type='hidden' name='contact_id' value="<?php echo $row['contacts_ID'] ?>" W>
                                                                <button type='submit' class='btn btn-danger'>Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Add Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:rgba(255,255,255, .1); border:none"><sup style="font-size:15px">x</sup></button>
                        </div>
                        <div class="modal-body">
                            <form id="contactForm" action="add_contact.php" method="POST">
                                <input type="hidden" id="contactId" name="contactId">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName">
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>   
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
   
    <?php


    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '" . $status . "'
                }).then(function(){
                    window.location.href = 'contacts-list-archived.php';
                })
            </script>";
    }
    ?>
</body>

</html>