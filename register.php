<?php  
  include ('header.php');

        include ('connection.php');
                  if(isset($_POST['register'])){

            $rusn=$_POST['rusn'];
            $rpsd=$_POST['rpsd'];
            $rcpsd=$_POST['rcpsd'];
            $fullname=$_POST['rfullname'];
            $Email=$_POST['rEmail'];
            $phonenum=$_POST['rphonenum'];
            $hash = md5( rand(0,1000) );
            $sql = "SELECT * FROM `users` WHERE username='$rusn' and password='$rpsd'";
            $result = $con->query($sql);

             if ($result->num_rows > 0) {

                 $Error= "Ooohs: Account Already Taken";
             }
              else {
                if ($rpsd === $rcpsd) {
                  # code...
               $insert_sql = "INSERT INTO `users`(`username`, `password`, `fullname`, `Email`, `phone`, `hash`) VALUES('$rusn', '$rpsd', '$fullname', '$Email', '$phonenum', '$hash')";
               $result = $con->query($insert_sql);

               $to      = $Email; // Send email to our user
              $subject = 'Signup | Verification'; // Give the email a subject 
              $message = '
                
              Thanks for signing up!
              Your account has been created, Pressing the url below to ctive your account.
                
              ------------------------
              Username: '.$rusn.'
              Password: '.$rpsd.'
              ------------------------
                
              Please click this link to activate your account:
              http://localhost/agritech/v1/verify.php?email='.$Email.'&hash='.$hash.'
                
              '; // Our message above including the link
                                    
              $headers = 'From:ssenkootos74@gmail.com' . "\r\n"; // Set from headers
              mail($to, $subject, $message, $headers); // Send our email


                $Error= "Active your Account with the link sent to your email";
                //$Error= "Account has been created.";
                //header("Location: index.php?registered=sucess");
                }
                else{
                  $Error = "Ooohs Error: Entered Passwords donot Match !";

            }
                }


        }

?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4"></h2>
              <div class="auto-form-wrapper">
                <form action="#" method="POST">
                  <div align="center" style="color: red; margin: 5px;">
                    <?php echo "Ooohs Error: Entered Passwords donot Match !"; ?>
                  </div>
                  <div align="center" style="color: red; margin: 5px;">
                    <span id='message'></span>
                  </div>

                   <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="rfullname" id="fullname" placeholder="Full name" required="">

                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <div class="input-group">
                      <input type="email" class="form-control" name="rEmail" id="Email" placeholder="Email" required="">

                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="rphonenum" id="phonenum" placeholder="Phone Number" required="">

                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="rusn" id="username" placeholder="Username / Sysid" required="">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" class="form-control" name="rpsd" id="password" placeholder="Password" required="">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" class="form-control" name="rcpsd" id="confirm_password" placeholder="Confirm Password" required="">

                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group d-flex justify-content-center">
                    <div class="form-check form-check-flat mt-0">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success submit-btn btn-block" name="register">Register</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="index.html" class="text-black text-small">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script type="text/javascript">

      $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
          $('#message').html('Passwords Matching').css('color', 'green');
        } else 
          $('#message').html('Passwords Not Matching').css('color', 'red');
      });

    </script>

 <?php

  include 'includes/scripts.php';

?>