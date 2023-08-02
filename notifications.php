<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
        <a href="subscriber.php"><li>Subscribers</li></a>
        <li ><a href="#" onclick="promptPassword()">Admin Panel</a></li>
       
        
        
        </ul>
        
        <button class="press"><a href="logout.php">Log Out</a></button>
        <img src="pics/edit-removebg-preview.png" width="70px" height="70px" class="make"><span><h1 class="PIT"> E -</h1> <h1 class="PITsX">ALERT  </h1</span>
            
</div>
<div class="two">
<h1 class="form-title">REAL-TIME NOTIFICATIONS</h1>

</div>
<!-- <?php include ("now.php"); 
  // echo "Notificatio: " . $dateTime;
?> -->
<div class="acc">
    <table border="2">
        <thead>
        <tr>
            <th>Bed Number</th>
            <th>Room Number</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['bedNo']; ?></td>
                <td><?php echo $row['roomNo']; ?></td>
                <td><?php echo $row['Date']; ?></td>
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
  let lastCheck = new Date().toISOString();

  function fetchNotifications() {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', `now.php?lastCheck=${lastCheck}`, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = JSON.parse(xhr.responseText);
      
      if(data.length > 0) {
        // Configure Toastr for sticky notifications
        toastr.options.timeOut = 0; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 0; // How long the toast will display after a user hovers over it

        let toastrMethods = [toastr.success, toastr.info, toastr.warning, toastr.error];
        let index = 0;

data.forEach(notification => {
  toastr.options.onclick = function() { updateStatus(notification.id); };  // Call updateStatus when a notification is clicked
  toastrMethods[index](`ALERT MEDICAL EMERGENCY!!<br> Attend to Patient in :<br>Room No: ${notification.roomNo}<br>Bed No: ${notification.bedNo}<br>`, '', { allowHtml: true });

  // Increment the index and reset it to 0 if it's greater than the number of toastrMethods
  index = (index + 1) % toastrMethods.length;
});


        lastCheck = new Date().toISOString();
      } else {
        // toastr.error('No new notifications');
      }
    }
  };
  xhr.send();
}



  function updateStatus(id) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `update_status.php?id=${id}`, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        toastr.clear();  // Remove all Toastr notifications
        fetchNotifications();  // Fetch new notifications again
      }
    };
    xhr.send();
  }

  setInterval(fetchNotifications, 2000);  // Check for new notifications every 2 seconds

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