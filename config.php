<?php
   session_start();
            include ('connection.php');
            if(isset($_POST['signin'])){

            unset($_SESSION["account"]);
            $_SESSION['account'] = 'true';
            //$Date=date('d-m-Y');
            $usn=$_POST['email'];
            $psd=$_POST['psd'];
            $_SESSION['email'] = $usn;
            $sql = "SELECT * FROM `users` WHERE Email='$usn' AND password ='$psd' AND active='1'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              // session_start();
                 while($row = $result->fetch_assoc()) {

                    $_SESSION['email'] = $row["email"];
                    $_SESSION['password'] = $row["password"];
                    
                 }
                 if($_SESSION["account"] = "true" ) {
                header("Location: home.php");
              }
            }
             else {
                $Error = "Ooohs: Wrong Username or Password";
                $_SESSION['error'] = $Error;
                header("Location: index.php");
            }


        }
    

?>