<?php
include("connection.php");
session_start();
if($_SESSION['user']==''){
	header('location:login.php');
	
}
if(isset($_POST["send"])) {
	$today=date("Y-m-d");
	$day=$today;
$sql = "INSERT INTO message(No,Phone,message) 
				VALUES ( NULL,:Phone,:message)";
		$pdo_statement = $con->prepare( $sql );	
		$result = $pdo_statement->execute( array(':Phone'=>$_POST['Phone'],
		':message'=>$_POST['message']));
	
	if (!empty($result) ){
	header('location:View_customer.php?sms');
	}
}

?>
<!DOCTYPE html>
 <head>
   <meta charset="utf-8" />
  </head>
  <body bgcolor="purple">
  
   <div id="container">
    <h1>Sending SMS </h1>
    <form action="" method="post">
     <ul>
      <li>
       <label for="phoneNumber">Phone Number</label>
       <input type="number" name="Phone" id="phoneNumber" placeholder="Enter your phone " /></li><br>
      <br>
      <li>
       <textarea name="message" id="smsMessage" cols="45" rows="15"></textarea>
      </li><br>
     <li><input type="submit" name="send" id="sendMessage" value="Send Message" /></li>
    </ul>
   </form>
  </div>
 </body>
</html>