<?php
    include '../model/AdminModel.php';
    class AdminControl
    {
        //index loading
        function LoadIndex()
        {
            header('Location:view/index.php');
        }

        //login
        function Login()
        {
            $uname = $_POST['email'];
            $pword = $_POST['password'];
            $obj = new AdminModel();
            $var = $obj -> Login($uname,$pword);
            if($uname == 'admin@gmail.com' && $pword == 'admin')
            {
                header('Location:admin_home.php');
            }
            else if($var == 'faculty')
            {
                header('Location:faculty_home.php');
            }
            else if($var == 'student')
            {
                header('Location:student_home.php');
            }
            else{
                echo "Incorrect password or username";
            }
        }

        //faculty registration
        function FacultyRegister($name,$address,$gender,$dob,$mobile,$email,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyRegister($name,$address,$gender,$dob,$mobile,$email,$pword);
            if($var == "true")
            {
                header('Location:login.php');
            }
        }

        //faculty registration from admin side
        function AdminFacultyRegister($name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminFacultyRegister($name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:admin_faculties.php');
            }
        }

        //student registration from admin side
        function AdminStudentRegister($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminStudentRegister($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:admin_students.php');
            }
        }

        //faculty table view from admin side
        function AdminFacultyView()
        {
            $obj = new AdminModel();
            $var = $obj -> AdminFacultyView();
            return $var;
        }

        //student table view from admin side
        function AdminStudentView()
        {
            $obj = new AdminModel();
            $var = $obj -> AdminStudentView();
            return $var;
        }

        //faculty approve from admin side
        function AdminFacultyApprove($fid)
        {
            $obj = new AdminModel();
            $var = $obj->AdminFacultyApprove($fid);
            if($var == 'true')
            {
                header('Location:admin_home.php');
            }
        }

        //faculty registration from admin side
        function AdminFacultyUpdate($fid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminFacultyUpdate($fid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:admin_home.php');
            }
        }

        //student registration from admin side
        function AdminStudentUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminStudentUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:admin_students.php');
            }
        }
        

        //faculty details from admin side
        /*function AdminFacultyDetails($fid)
        {
            $obj = new AdminModel();
            $var = $obj->AdminFacultyDetails($fid);
            require_once 'admin_faculty_profile_edit.php?id="'.$var.'"';
        }*/

        //semester add from admin side
        function AdminSemesterAdd($dname,$sno,$s1,$s2,$s3,$s4)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminSemesterAdd($dname,$sno,$s1,$s2,$s3,$s4);
            if($var == "true")
            {
                header('Location:admin_cs_semester.php');
            }
        }

        //semester update from admin side
        function AdminSemesterUpdate($sid,$dname,$sno,$s1,$s2,$s3,$s4)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminSemesterUpdate($sid,$dname,$sno,$s1,$s2,$s3,$s4);
            if($var == "true")
            {
                header('Location:admin_cs_semester.php');
            }
        }

        //student registration from faculty side
        function FacultyStudentRegister($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminStudentRegister($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:faculty_home.php');
            }
        }

        //student updation from faculty side
        function FacultyStudentUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminStudentUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:faculty_home.php');
            }
        }

        //faculty profile update fron faculty
        function FacultyProfileUpdate($fid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminFacultyUpdate($fid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
            if($var == "true")
            {
                header('Location:faculty_profile_edit.php');
            }
        }

        //semester update from faculty side
        function FacultySemesterUpdate($sid,$dname,$sno,$s1,$s2,$s3,$s4)
        {
            $obj = new AdminModel();
            $var = $obj -> AdminSemesterUpdate($sid,$dname,$sno,$s1,$s2,$s3,$s4);
            if($var == "true")
            {
                header('Location:faculty_home.php');
            }
        }

        //timetable creation from faculty side
        function FacultyTimetableAdd($sdept,$sno,$day,$h1,$h2,$h3,$h4)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyTimetableAdd($sdept,$sno,$day,$h1,$h2,$h3,$h4);
            if($var == "true")
            {
                header('Location:faculty_home.php');
            }
        }

        //timetable updation from faculty side
        function FacultyTimetableupdate($tid,$sdept,$sno,$day,$h1,$h2,$h3,$h4)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyTimetableupdate($tid,$sdept,$sno,$day,$h1,$h2,$h3,$h4);
            if($var == "true")
            {
                header('Location:faculty_home.php');
            }
        }

        //notice creation from admin side
        function AdminNoticeNew($author,$fdept,$title,$bdate,$edate,$desc)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyNoticeNew($author,$fdept,$title,$bdate,$edate,$desc);
            if($var == "true")
            {
                header('Location:admin_notice_view.php');
            }
        }

        //notice creation from faculty side
        function FacultyNoticeNew($author,$fdept,$title,$bdate,$edate,$desc)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyNoticeNew($author,$fdept,$title,$bdate,$edate,$desc);
            if($var == "true")
            {
                header('Location:faculty_notice_view.php');
            }
        }

        //notice updation from faculty side
        function FacultyNoticeupdate($tid,$author,$title,$bdate,$edate,$desc)
        {
            $obj = new AdminModel();
            $var = $obj -> FacultyNoticeupdate($tid,$author,$title,$bdate,$edate,$desc);
            if($var == "true")
            {
                header('Location:faculty_notice_view.php');
            }
        }

         //student profile updation from student side
         function StudentProfileUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
         {
             $obj = new AdminModel();
             $var = $obj -> StudentProfileUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword);
             if($var == "true")
             {
                 header('Location:student_profile_edit.php');
             }
         }
    }
?>