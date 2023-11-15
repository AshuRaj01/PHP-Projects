<?php
    try 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST['uname'];
            $Gender = $_POST['ugen'];
            $Contact_num = $_POST['ucon'];
            $Email_ID = $_POST['uemail'];
            $Password = $_POST['upass'];

            $serverName = 'localhost';
            $userName = 'root';
            $userPassword = '';
            $userDatabase = 'demoDatabase';

            mysqli_report(MYSQLI_REPORT_STRICT);

            $con = new mysqli($serverName,$userName,$userPassword,$userDatabase);
            // echo "connection Successful.";
            
            if ($con->connect_error) {
                die("connection failed: " . $con->connect_error);
            }
            
            $query = "SELECT * FROM userinfo WHERE email_ID = '$Email_ID' AND passWord = '$Password'";
            $result = $con->query($query);

            if($result->num_rows>0)
            {
                echo"Account is already is exist with this ' $Email_ID ' <br> So, try again with another Gmail Account : )";
                return false;
            }
            else
            {
                $sql = "INSERT INTO userinfo(Name, gender, contact_number, email_ID, passWord) VALUES ('$name','$Gender','$Contact_num','$Email_ID','$Password')";
            
                if ($con->query($sql) === TRUE) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
        
            $con->close();
        }
    } 
    catch (Exception $ex) 
    {
        echo "conection Failed: ".$ex->getMessage();   
    }
?>