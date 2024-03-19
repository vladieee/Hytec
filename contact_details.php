<?php
include "includes/connect.php";

$query = "SELECT * FROM contacts WHERE contacts_ID = '$_GET[id]'";
$data = $con->query($query);
$row = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="page-top">
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
                    <h1 class="h3 mb-2 text-gray-800">Contact Details</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="card position-relative">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Contact Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="small mb-1">Contact ID</div>

                                                <a class="navbar-brand" href="#" style="color:black"><?php echo $row[0]['contacts_ID'] ?></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="small mb-1">First Name</div>

                                                <a class="navbar-brand" href="#" style="color:black"><?php echo $row[0]['fName'] ?></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="small mb-1">Last Name</div>

                                                <a class="navbar-brand" href="#" style="color:black"><?php echo $row[0]['lName'] ?></a>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            
                                        <div class="col-lg-4">
                                                <div class="small mb-1">Contact Number</div>

                                                <a class="navbar-brand" href="#" style="color:black"><?php echo $row[0]['cNum'] ?></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="small mb-1">Email Address</div>

                                                <a class="navbar-brand" href="#" style="color:black"><?php echo $row[0]['eMail'] ?></a>
                                            </div>
                                        </div>

                                        <!-- <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Dropdown
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </li>
                                            </ul> -->

                                        <!-- <p class="mb-0 small">Note: This utility animates the CSS transform property,
                                            meaning it will override any existing transforms on an element being animated!
                                            In this theme, the grow in animation is only being used on dropdowns within the
                                            navbar.</p> -->
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="card position-relative">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Sample</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <!-- <code>.animated--grow-in</code> -->
                                        </div>
                                        <!-- <div class="small mb-1">Navbar Dropdown Example:</div> -->
                                        <!-- <nav class="navbar navbar-expand navbar-light bg-light mb-4">
                                            <a class="navbar-brand" href="#">Navbar</a>
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Dropdown
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav> -->
                                        <p class="mb-0 small">Note: This utility animates the CSS transform property,
                                            meaning it will override any existing transforms on an element being animated!
                                            In this theme, the grow in animation is only being used on dropdowns within the
                                            navbar.</p>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>