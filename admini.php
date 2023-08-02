<?php include ("connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="parent">
        <div class="two">
            <ul class="list">
                <a href="home.php"><li id="about">Home</li></a>
                <a href="notifications.php"><li>Notifications</li></a>
                <a href="add.html"><li>Add Subscriber</li></a>
                <a href="subscriber.php"><li>Subcsribers</li></a>
            
            </ul>
            
            <button class="press">log out</button>
            <!-- <button class="pres">StopAlarm</button> -->
            <img src="pics/edit-removebg-preview.png" width="70px" height="70px" class="make"><span><h1 class="PIT"> E-</h1> <h1 class="PITs"> ALERT </h1></span>
                </div>
                <div class="three">
                    <div class="mark">
                        <div class="sidebar">
                            <div class="over">

                            <div style="display: flex; justify-content: center;">
  <img src="pics/admin.png" style="width: 200px; height: 200px;" class="admins" style="display: block; margin: 0 auto;">
</div>
<div style="display: flex; justify-content: center;">
    <h1 style="font-size: px;">Admin</h1>
</div>



<div class="lines" style="display: flex; justify-content: center;">

    <ul>
        <li>
            <p>DASHBOARD</p>
        </li>
 
        <li>
            <p>SETTINGS</p>
        </li>
        <li>
            <p>SUBSCRIBERS</p>
        </li>
        <li>
            <p>LOG OUT</p>
        </li>
    </ul>
</div>


</div>

                        </div>
                        <div class="content">
                        <div class="row">
                                    <div class="container">
        <div class="column">
            <a href="notifications.php">
                <div class="blue card">
                    <img src="pics/notification.png" alt="Staff Icon">
                    <h2>NOTIFICATIONS</h2>
                    <p>
                    <?php 
include ("connection.php");
// SQL QUERY
$query = "SELECT  * FROM `notifications` WHERE DATE(Date) = CURDATE();";
// FETCHING DATA FROM DATABASE
$result = mysqli_query($con, $query);
$num = strval( mysqli_num_rows($result));
?>
                                                <span class="label">Notifications:</span>
                                                <span class="value" id="totalOrders"><?php echo htmlentities($num);?></span>
                    </p>
                </div>
            </a>
            <a href="subscribers.php">
                    <div class="green card">
                    <img src= "pics/subscriber.png"  >
                    <h2>SUBSCRIBERS</h2>
                    <p>
                    <?php 
include ("connection.php");
// SQL QUERY
$query = "SELECT  * FROM `subscribers`;";
// FETCHING DATA FROM DATABASE
$result1 = mysqli_query($con, $query);
$num1 = strval( mysqli_num_rows($result1));
?>
                                                <span class="label">Subscribers:</span>
                                                <span class="value" id="totalOrders"><?php echo htmlentities($num1);?></span>
                    </p>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="other_page.html">
                <div class="grey card">
                    <img src="pics/doctor.png" alt="Other Icon">
                    <h2>STAFF </h2>
                    <p><?php 
include ("connection.php");
// SQL QUERY
$query = "SELECT  * FROM `staff`;";
// FETCHING DATA FROM DATABASE
$result1 = mysqli_query($con, $query);
$num1 = strval( mysqli_num_rows($result1));
?>
                                                <span class="label">Staff:</span>
                                                <span class="value" id="totalOrders"><?php echo htmlentities($num1);?></span></p>
                </div>
            </a>
        </div>
    </div>
                        </div>
                    </div>
                
               
                <div >
                                
    <div class ="five">
    
           
          
                            <ul class="display">
                             <li>
                                 <h1 class="contact">Contacts</h1>
                           <ul class="foot">
                                <a href="http://"><li>> pearlhandsmed@gmail.com</li></a>
                                <a href="http://"><li>> +256-786962570</li></a>
                                <a href="http://"><li>> @pearlhands.yahoo</li></a>
                                <a href="http://"><li></li></a>
                                <a href="http://"><li></li></a>
                           </ul>
                         </li>
                         <li>
                             <h1 class="contact">Contacts</h1>
                           <ul class="foots">
                             <a href="home.html"><li id="about">Home</li></a>
                             <a href="notifications.html"><li>Notifications</li></a>
                             <a href="about.html"><li>About Us</li></a>
                             <a href="contacts.html"><li>Contacts</li></a>
                             <a href="alert.html"><li><img src="pics/notification-14159-removebg-preview.png" width="30px" height="30px"> </li></a>
                              
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
    
    
    
                       
</body>
</html>