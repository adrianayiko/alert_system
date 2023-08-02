<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notifications</title>
    <link rel="stylesheet" href="alert.css">
    <style>
  <?php include "notification.css" ?>
</style>
</head>
<body>
<div class="parent">
<div class="one">
    <ul class="list">
        <a href="home.php"><li id="about">Home</li></a>
        <a href="notifications.php"><li>Notifications</li></a>
        <a href="about.php"><li>About Us</li></a>
        <a href="subscriber.php"><li>Contacts</li></a>
        <li ><a href="#" onclick="promptPassword()">Admin Panel</a></li>
       
        
        
        </ul>
        
        <button class="press"><a href="logout.php">Log Out</a></button>
        <img src="pics/edit-removebg-preview.png" width="70px" height="70px" class="make"><span><h1 class="PIT"> E -</h1> <h1 class="PITsX">ALERT  </h1</span>
            
</div>
<div class="two">
<h1 class="form-title">SUBSCRIBERS</h1>

</div>
<?php include ("sub.php"); 
  // echo "Notificatio: " . $dateTime;
?>
<div class="acc">
      <table border="2">
              <thead>
                  <tr>
                      <th>NAME OF COMPANY </th>
                      <th>LOCATION</th>
                      <th>NUMBER OF UNITS</th>
                      <th>NUMBER OF MONTHS</th>
                      <th>STARTING DATE</th>
                      <th>END DATE</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($val as $row): ?>
                      <tr>
                          <td><?php echo $row['companyName']; ?></td>
                          <td><?php echo $row['location']; ?></td>
                          <td><?php echo $row['buttonNumbers']; ?></td>
                          <td><?php echo $row['timePeriod']; ?></td>
                          <td><?php echo $row['startingDate']; ?></td>
                          <td><?php echo $row['EndingDate']; ?></td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
</div>

<div class="three">    
        <ul class="display">
         <li>
             <h1 class="contact">Contacts</h1>
       <ul class="foot">
            <a href="http://"><li>e-alert@gmail.com</li></a>
            <a href="http://"><li>+256-786962570</li></a>
            <a href="http://"><li>@e-alert.yahoo</li></a>
            <a href="http://"><li></li></a>
            <a href="http://"><li></li></a>
       </ul>
     </li>
     <li>
         <h1 class="contact">Contacts</h1>
       <ul class="foots">
         <a href="home.php"><li id="about">Home</li></a>
         <a href="notifications.php"><li>Notifications</li></a>
         <a href="about.php"><li>About Us</li></a>
         <a href="subscriber.php"><li>Contacts</li></a>
         <a href="#"><li><img src="pics/notification-14159-removebg-preview.png" width="30px" height="30px"> </li></a>
          
       </ul>
       </li>
 
       <li  id="pin">
         <h1 class="contact">Leave an Inquiry</h1>
         <form >
             
             <input type="email" size="40" placeholder="myname@gmail.com"text-align="left "id="username"><br><br>
             <textarea rows="10" cols="40"></textarea><br>
             <input type="submit" value="submit" style="background-color: green; color: white;">
             </form>
          
 
 
 
       </li>
     </ul>
    
</div>

 </div>

<script>
    function promptPassword() {
      var password = prompt("Enter the password for Admin Panel:");
      
      if (password === "1029") {
        window.location.href = "admini.php"; // Replace with the actual URL of the protected admin page
      } else {
        alert("Incorrect password. Please try again.");
      }
    }


  </script>
</body>
</html>