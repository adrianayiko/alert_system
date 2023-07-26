<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
    <form id="loginForm" action="config.php" method="POST">
        <img src="pics/edit-removebg-preview.png" width="60px" height="60px" class="image">
        
        <h1 class="PITss"> E - </h1> <h1 class="PITz"> ALERT</h1>
        <h1>Login</h1>
        <input type="email" id="email" placeholder="Email" name= "email" required><br>
        <input type="password" id="password" placeholder="Password" name= "psd" required><br>
        <button type="submit" name="signin" >Login</button><br><br>
           <span>Not Registered ?</span>
        <a href="register.php" class="text-black text-small">create account</a>
        
    </form>
    <!-- <p> </p> <div class="user"><a href="signup.html"> <h3>Sign Up</h3></a></div>-->
</div> 
     <script src="login.js"></script>
</body>
</html>