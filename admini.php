
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="parent">
        <div class="two">
            <ul class="list">
                <a href="home.html"><li id="about">Home</li></a>
                <a href="notifications.html"><li>Notifications</li></a>
                <a href="add.html"><li>Add Subscriber</li></a>
                <a href="subscribers.html"><li>Subcsribers</li></a>
            
            </ul>
            
            <button class="press">log out</button>
            <button class="pres">StopAlarm</button>
            <img src="pics/edit-removebg-preview.png" width="70px" height="70px" class="make"><span><h1 class="PIT"> E-</h1> <h1 class="PITs"> ALERT </h1></span>
                </div>
                <div class="three">
               
                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-students.php">
<?php 
$sql1 ="SELECT * from subscribers ";
$query1 = $con -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalstudents=$query1->rowCount();
?>

                                            <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                                            <span class="name">SUBSCRIBERS.</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                
                </div>

                        <div class="five">
    
           
          
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