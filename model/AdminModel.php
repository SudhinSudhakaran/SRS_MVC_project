<?php

    class AdminModel
    {
        //login
        function Login($uname,$pword)
        {
            include 'config/connection.php';
            $sql = "SELECT * FROM faculty WHERE femail = '".$uname."' and fpassword = '".$pword."' ";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                   
                    $_SESSION['fid'] = $row['fid'];
                    $_SESSION['fdept'] = $row['fdept'];
                    $_SESSION['author'] = 'Faculty';
                    return 'faculty';
                }
            }
            $sql1 = "SELECT * FROM student WHERE smail = '".$uname."' and spassword = '".$pword."' ";
            $result1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)>0)
            {
                while($row = mysqli_fetch_assoc($result1))
                {
                   
                    $_SESSION['sid'] = $row['sid'];
                    $_SESSION['sdept'] = $row['sdept'];
                    return 'student';
                }
            }
        }

        //faculty registration
        function FacultyRegister($name,$address,$gender,$dob,$mobile,$email,$pword)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO faculty (fname,faddress,femail,fmobile,fdob,fgender,fpassword) VALUES('".$name."','".$address."','".$email."','".$mobile."','".$dob."','".$gender."','".$pword."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }
        //faculty registration by admin
        function AdminFacultyRegister($name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO faculty (fname,faddress,fdept,femail,fmobile,fdob,fgender,fpassword) VALUES('".$name."','".$address."','".$dept."','".$email."','".$mobile."','".$dob."','".$gender."','".$pword."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }
        //student registration by admin
        function AdminStudentRegister($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO student (sreg_no,sname,saddress,smail,smobile,sdob,sgender,sdept,spassword) VALUES('".$regid."','".$name."','".$address."','".$email."','".$mobile."','".$dob."','".$gender."','".$dept."','".$pword."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }
        //admin approved faculty table view by admin
        function AdminFacultyView()
        {
            include 'config/connection.php';
            $sql = "SELECT * FROM faculty where fstatus = 'approved' ";
            if(mysqli_query($conn,$sql))
            {
                $result = mysqli_query($conn,$sql);
                return $result;
            }
        }

        //admin pending faculty table view by admin
        function AdminStudentView()
        {
            include 'config/connection.php';
            $sql = "SELECT * FROM student";
            if(mysqli_query($conn,$sql))
            {
                $result = mysqli_query($conn,$sql);
                return $result;
            }
        }

        //approve faculty applications by admin
        function AdminFacultyApprove($fid)
        {
            include 'config/connection.php';
            $sql = "UPDATE faculty SET fstatus = 'approved' where fid = '".$fid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //faculty profile updation by admin
        function AdminFacultyUpdate($fid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            include 'config/connection.php';
            $sql = "UPDATE faculty SET fname = '".$name."',faddress = '".$address."',fdept = '".$dept."',femail = '".$email."',fmobile = '".$mobile."',fdob = '".$dob."',fgender = '".$gender."',fpassword = '".$pword."' WHERE fid = '".$fid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }
        //student profile updation by admin
        function AdminStudentUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            include 'config/connection.php';
            $sql = "UPDATE student SET sname = '".$name."',saddress = '".$address."',smail = '".$email."',smobile = '".$mobile."',sdob = '".$dob."',sgender = '".$gender."',fdept = '".$dept."',fpassword = '".$pword."' WHERE sreg_no = '".$regid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //faculty deatils applications by admin
        /*function AdminFacultyDetails($fid)
        {
            include 'config/connection.php';
            $sql = "SELECT * FROM faculty where fid = '".$fid."'";
            if(mysqli_query($conn,$sql))
            {
                $result = mysqli_query($conn,$sql);
                return $result;
            }
        }*/

        //semester add from admin side
        function AdminSemesterAdd($dname,$sno,$s1,$s2,$s3,$s4)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO semester (dept_name,dept_sem,sub1,sub2,sub3,sub4) VALUES('".$dname."','".$sno."','".$s1."','".$s2."','".$s3."','".$s4."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //semester update from admin side
        function AdminSemesterUpdate($sid,$dname,$sno,$s1,$s2,$s3,$s4)
        {
            include 'config/connection.php';
            $sql = "UPDATE semester SET dept_name = '".$dname."',dept_sem = '".$sno."',sub1 = '".$s1."',sub2 = '".$s2."',sub3 = '".$s3."',sub4 = '".$s4."' where sid = '".$sid."' ";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //timetable creation from faculty side
        function FacultyTimetableAdd($sdept,$sno,$day,$h1,$h2,$h3,$h4)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO timetable (dept_name,semester_no,day,hour1,hour2,hour3,hour4) VALUES('".$sdept."','".$sno."','".$day."','".$h1."','".$h2."','".$h3."','".$h4."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //timetable updation from faculty side
        function FacultyTimetableupdate($tid,$sdept,$sno,$day,$h1,$h2,$h3,$h4)
        {
            include 'config/connection.php';
            $sql = "UPDATE timetable SET dept_name = '".$sdept."',semester_no = '".$sno."',day = '".$day."',hour1 = '".$h1."',hour2 = '".$h2."',hour3 = '".$h3."',hour4 = '".$h4."' WHERE tid = '".$tid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //new notice creation from faculty side
        function FacultyNoticeNew($author,$fdept,$title,$bdate,$edate,$desc)
        {
            include 'config/connection.php';
            $sql = "INSERT INTO notice (author,dept_name,title,sdate,edate,description) VALUES('".$author."','".$fdept."','".$title."','".$bdate."','".$edate."','".$desc."')";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //notice updation from faculty side
        function FacultyNoticeupdate($tid,$author,$title,$bdate,$edate,$desc)
        {
            include 'config/connection.php';
            $sql = "UPDATE notice SET author = '".$author."',title = '".$title."',sdate = '".$bdate."',edate = '".$edate."',description = '".$desc."' WHERE nid = '".$tid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }

        //student profile updation by student itself
        function StudentProfileUpdate($regid,$name,$address,$gender,$dob,$mobile,$email,$dept,$pword)
        {
            include 'config/connection.php';
            $sql = "UPDATE student SET sname = '".$name."',saddress = '".$address."',smail = '".$email."',smobile = '".$mobile."',sdob = '".$dob."',sgender = '".$gender."',fdept = '".$dept."',fpassword = '".$pword."' WHERE sreg_no = '".$regid."'";
            if(mysqli_query($conn,$sql))
            {
                return true;
            }
        }
    }
?>