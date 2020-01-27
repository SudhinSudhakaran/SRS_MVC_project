<?php
    session_start();
    include '../controller/AdminControl.php';
    $obj = new AdminControl();
    if(isset($_POST['submit']))
    {
        $tid = $_POST['tid'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $bdate = $_POST['bdate'];
        $edate = $_POST['edate'];
        $desc = $_POST['desc'];
        $obj -> FacultyNoticeupdate($tid,$author,$title,$bdate,$edate,$desc);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Edu.com</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="admin_home.php"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="faculty_profile_edit">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                            <div class="sb-sidenav-menu">
                                <div class="nav">
                                    <a class="nav-link" href="admin_home.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                        Home</a
                                    >
                                    <a class="nav-link" href="admin_faculties.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Faculties</a
                                    >
                                    <a class="nav-link" href="admin_students.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                        Students</a
                                    >
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapseLayouts"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                                        Notice
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapse" aria-labelledby="headingThree" data-parent="">
                                    <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="admin_notice_new.php">Create Notice </a>
                                            <a class="nav-link" href="admin_notice_view.php">View Notice</a>
                                    </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Semester
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="Admin_cs_semester.php?id=Computer Science">Computer Science </a>
                                            <a class="nav-link" href="Admin_cs_semester.php?id=Commerce">Commerce</a>
                                            <a class="nav-link" href="Admin_cs_semester.php?id=History">History</a></nav>
                                    </div>
                                   
                                       
                                        </nav>
                                    </div>
                                    <div class="sb-sidenav-menu-heading"></div>
                                    <a class="nav-link" href="charts.html"
                                        ><div class="sb-nav-link-icon"><i class=""></i></div>
                                        </a
                                    ><a class="nav-link" href="tables.html"
                                        ><div class="sb-nav-link-icon"><i class=""></i></div>
                                        </a
                                    >
                                </div>
                            </div>
                                <div class="sb-sidenav-footer">
                                    <div class="small">Logged in as:</div>
                                    Administrator
                                </div>
                            
                    
                    </div>
                <div id="layoutSidenav_content">
    <main>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Notice</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                        <?php
                                        include '../model/config/connection.php';
                                        $nid = $_GET['id'];
                                        $sql = "SELECT * FROM notice where nid = '".$nid."'";
                                        $result = mysqli_query($conn,$sql);
                                        if($row = mysqli_fetch_assoc($result))
                                        {
						  
                                    ?>
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">ID</label><input class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="nameHelp" placeholder="Enter name" name="tid" value="<?php echo $row['nid']; ?>" readonly/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Author</label><input class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="nameHelp" placeholder="Enter name" name="author" value="<?php echo $row['author']; ?>" readonly/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Title</label><input class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="nameHelp" placeholder="Enter Tiltle" name="title" value="<?php echo $row['title']; ?>"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Beginning Date</label><input class="form-control py-4" id="inputEmailAddress" type="date" aria-describedby="emailHelp" placeholder="Enter beginning date" name="bdate" value="<?php echo $row['sdate']; ?>"><div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">End Date</label><input class="form-control py-4" id="inputEmailAddress" type="date" aria-describedby="emailHelp" placeholder="Enter end date" name="edate"value="<?php echo $row['edate']; ?>"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Description</label><textarea class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Enter description" name="desc"value=""><?php echo $row['description']; ?></textarea></div>
                                            
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" name="submit" value="Update" href=""></div>
                                        <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
