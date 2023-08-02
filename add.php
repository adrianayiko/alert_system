<?php

include ("connection.php");
//check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){

$name = $_POST['companyName'];
$location = $_POST['location'];
$button= $_POST['buttonsRequired'];
$period= $_POST['period'];
$start= $_POST['startDate'];
$end = $_POST['endDate'];

//check connection


}


// insert records
$insert_query =  $con->query("INSERT INTO `subscribers`(`companyName`, `location`, `buttonNumbers`, `timePeriod`, `startingDate`, `EndingDate`) VALUES ('$name','$location','$button','$period','$start','$end')") or 
die(mysqli_error($con));


if ($insert_query) {

header("Location: add.html");
	
echo ".........................success...........................";

}



else{
echo "". "OOOOH FAILED";
}

?>