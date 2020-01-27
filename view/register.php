<?php
    include '../controller/AdminControl.php';
    $obj = new AdminControl();
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
         $obj -> FacultyRegister($name,$address,$gender,$dob,$mobile,$email,$password);
       
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
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="fontawesomejs/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" name="myform" onsubmit="return validateform()">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Name</label><input required class="form-control py-4" id="name" type="text" aria-describedby="nameHelp" placeholder="Enter name" name="name"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Address</label><textarea required class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Enter address" name="address"></textarea></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Gender</label><input required class="form-control py-4" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="male/female/other" name="gender"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Date of Birth</label><input required class="form-control py-4" id="inputEmailAddress" type="date" aria-describedby="emailHelp" placeholder="Enter date of birth" name="dob"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Mobile</label><input required class="form-control py-4" id="mobile" type="text" aria-describedby="emailHelp" placeholder="Enter mobile number" name="mobile" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input required class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input required class="form-control py-4" id="Password" type="password" placeholder="Enter password" name="password"/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input required class="form-control py-4" id="cpassword" type="password" placeholder="Confirm password" name="cpassword"/></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" name="submit" value="Create Account" href=""></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-5">
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
        <script src="js/jquery.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            function validateform()
            {
                var str2=document.forms["myform"]["name"].value;
                var reg=/^[a-zA-Z]{2,30}$/;
                var str3=document.forms["myform"]["mobile"].value;
                var str5=document.forms["myform"]["password"].value;
                var str4=document.forms["myform"]["cpassword"].value;
                if(str2!=reg)
                {
                    alert("Enter valid name");
                    return false;
                }
                else if(str3.length!=10)
                {
                    alert("invalid mobile number");
                    return false;
                }
                else if(str5.length<6)
                {
                    alert("Password too short");
                    return false;
                }
                else if(str4.length!=str5)
                {
                    alert("password doesnt match");
                    return false;
                }
            }
        </script>
    </body>
</html>
