<?php 
    session_start();
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
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="student_profile_edit.php">Profile</a>
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
                                    <a class="nav-link" href="student_home.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                        Home</a
                                    >
                                    <a class="nav-link" href="student_profile_edit.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                        Profile</a
                                    >
                                    <a class="nav-link" href="student_faculties.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Faculties</a
                                    >
                                    
                                    <a class="nav-link" href="student_semester.php"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                        Semester</a
                                    >
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseL" aria-expanded="false" aria-controls="collapseLayouts"
                                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Time Table
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseL" aria-labelledby="headingFour" data-parent="">
                                    <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="student_timetable.php?id=Semester 1">Semester 1</a>
                                            <a class="nav-link" href="student_timetable.php?id=Semester 2">Semester 2</a>
                                            <a class="nav-link" href="student_timetable.php?id=Semester 3">Semester 3</a>
                                            <a class="nav-link" href="student_timetable.php?id=Semester 4">Semester 4</a>
                                            <a class="nav-link" href="student_timetable.php?id=Semester 5">Semester 5</a>
                                            <a class="nav-link" href="student_timetable.php?id=Semester 6">Semester 6</a>
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
                                    Student
                                </div>
                            
                        </nav>
                    </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-5">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_home.php">Student</a></li>
                            <li class="breadcrumb-item active"><?php echo $_SESSION['sdept'];?></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="row">
                            <div class="col-10 card-header"><i class="fas fa-table mr-1"></i>Notice Board</div>
                            <div class="col-2 card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Beginning Date</th>
                                                <th>Ending Date</th>
                                                <th>Author</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include '../model/config/connection.php';
                                        $var = $_SESSION['sdept'];
                                        $sql = "SELECT * from notice where author = 'Faculty' or dept_name = '".$var."' and dept_name !='faculty' ORDER BY sdate DESC";
                                        $result = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
						  
                                    ?>
                                        <tbody>
                                            <tr>
                                            <form method="POST">
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['sdate']; ?></td>
                                                <td><?php echo $row['edate']; ?></td>
                                                <td><?php echo $row['author']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                 </tr>
                                            </form>
                                            <?php } ?>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
