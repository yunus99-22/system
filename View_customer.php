<?php
include("connection.php");
session_start();
if($_SESSION['user']==''){
	header('location:login.php');
	
}
if(isset($_POST["sub"])) {
	$today=date("Y-m-d");
	$day=$today;
$sql = "INSERT INTO customer(ID,Name,Age,Address,No,
		Stutuss,M_ID,Date) 
				VALUES ( NULL,:Name,:Age,:Address,:No,
						:Stutuss,:M_ID,:Date)";
		$pdo_statement = $con->prepare( $sql );	
		$result = $pdo_statement->execute( array(':Name'=>$_POST['Name'],
		':Age'=>$_POST['Age'],':Address'=>$_POST['Address'],
		':No'=>$_POST['No'],':Stutuss'=>$_POST['Stutuss'],
		':M_ID'=>$_POST['M_ID'],':Date'=>$day));
	
	if (!empty($result) ){
	header('location:customer.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <title>Rgistration</title>

  <!-- Favicons -->
 

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

</head>

<body>
<?php	
	
	$pdo_statement = $con->prepare("SELECT * from customer");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	$n=1;
?>


  <section id="container">
    <!-- **********************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************** -->
    <!--header start-->
    <header class="header ifa_color-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Menus"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>CUSTOMER-<span></span>REGISTRATION</b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="Logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="p11.png" class="img-circle" width="130" height="100"></a></p>
          <h5 class="centered" style="color:#000000 ;">Online:</h5><h5 class="centered" style="color:#00CC33;"><?php echo $_SESSION['Status'];?></h5>
      <!---------- Upande wa Kushoto --------->
	  
	  <li class="sub-menu">
            <a href="" class="active">
              <i class="fa fa-Home"></i>
              <span> Customer</span>
              </a>
            <ul class="sub">
              <li><a href="View_customer.php">View customer</a></li>
             
			  
            </ul>
          </li>
		  
		   <li class="sub-menu">
            <a href="" class="active">
              <i class="fa fa-edit"></i>
              <span> Reports</span>
              </a>
            <ul class="sub">
			  <li><a href="report.php"target="_blank">All Report</a></li>
			   <li><a href="Logout.php">Logout</a></li>
            </ul>
          </li>
        

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}

		/* Button used to open the contact form - fixed at the bottom of the page */
		.open-button {
		  background-color: #555;
		  color: white;
		  padding: 16px 20px;
		  border: none;
		  border-radius:10px;
		  cursor: pointer;
		  opacity: 0.8;
		  position: fixed;
		  top: 65px;
		  right: 28px;
		  width: 150px;
		}

		/* The popup form - hidden by default */
		.form-popup {
		  display: none;
		  position: fixed;
		  bottom: 0;
		  right: 15px;
		  border: 3px solid #f1f1f1;
		  z-index: 9;
		}

		/* Add styles to the form container */
		.form-container {
		  max-width: 300px;
		  padding: 10px;
		  background-color: white;
		}

		/* Full-width input fields */
		.form-container input[type=text], .form-container input[type=password] {
		  width: 100%;
		  padding: 15px;
		  margin: 5px 0 22px 0;
		  border: none;
		  background: #f1f1f1;
		}

		/* When the inputs get focus, do something */
		.form-container input[type=text]:focus, .form-container input[type=password]:focus {
		  background-color: #ddd;
		  outline: none;
		}

		/* Set a style for the submit/login button */
		.form-container .btn {
		  background-color: #04AA6D;
		  color: white;
		  padding: 16px 20px;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		  margin-bottom:10px;
		  opacity: 0.8;
		}

		/* Add a red background color to the cancel button */
		.form-container .cancel {
		  background-color: red;
		}

		/* Add some hover effects to buttons */
		.form-container .btn:hover, .open-button:hover {
		  opacity: 1;
		}
	</style>
</head>

<b><button class="open-button" onclick="AddItem()">ADD CUSTOMER</button><b>

<div class="form-popup" id="myForm">

  <form action="" method="POST" class="form-container">
    <h3>New Manager</h3>
	</br>
    <label for="Name"><b>Name</b></label>
    <input type="text"class="form-control" placeholder="Enter Name" name="Name" required>
	<label for="Age"><b>Age</b></label>
    <input type="number"class="form-control" placeholder="Age" name="Age" required>
	<label for="Address"><b>Address</b></label>
    <input type="text"class="form-control" placeholder="Address" name="Address" required>
	<label for="No"><b>No</b></label>
    <input type="number"class="form-control" placeholder="No" name="No" required>
	
	<label for="Stutuss"><b>Stutuss</b></label>
    <input type="text"class="form-control" placeholder="Stutuss" name="Stutuss" required>

	<label for="M_ID"><b>M_ID</b></label>
    <input type="number"class="form-control"  placeholder="M_ID" name="M_ID" required>

    <label for="Date"><b>Date</b></label>
    <input type="date"class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly placeholder="Enter Date" name="Date" required>


    <button type="submit" name="sub" class="btn">Record</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


			<!-- message display-->
			<h5 style ="color:green;"><?php if(isset($_GET['sms'])){
				echo "Message Send Success!!";
			} ?></h5>
			
			<h5 style ="color:green;"><?php if(isset($_GET['sucd'])){
				echo "Delete Operation Success!!";
			} ?></h5>
			<h5 style ="color:green;"><?php if(isset($_GET['up'])){
				echo "Update Success!!";
			} ?></h5>
        <h4><i class="fa fa-plate"></i> MANAGER 
		 &nbsp &nbsp
		
			
<!-- form ya kugenerate report ya zilizo kushamda the unaenda kutegeneza page kwa ajili ya kuztumia hizo start and end date -->
		 <form  method="POST">
		 REGISTRATION SYSTEM
		 </form>
<!-- end form-->	
	 
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="sachi">
                <thead>
                  <tr>
					<th class="info">No</th>
                    <th class="info">Name</th>
                    <th class="info">Age</th>
                    <th class="info">Address</th>
					<th class="info">No</th>
					<th class="info">Stutuss</th>
					<th class="info">Date</th>
                    <th class="info">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				   $n=1;
						if(!empty($result)) { 
							foreach($result as $row) {
							
					?>
				
                 <tr class="">
					<td><?php echo $n; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["Age"]; ?></td>
                    <td><?php echo $row["Address"]; ?></td>
					<td><?php echo $row["No"]; ?></td>
					<td><?php echo $row["Stutuss"]; ?></td>
					<td><?php echo $row["Date"]; ?></td>
					<td>
				 <button class="btn btn-success btn-xs"><a href="sms.php"target="_blank" ?ID=<?php echo $row['ID']; ?>"><i class="fa fa-envelope "></i></a></button>
						<button class="btn btn-danger btn-xs"><a href="delete.php?ID=<?php echo $row['ID']; ?>"><i class="fa fa-trash-o "></i></a></button>
						
					</td>
				</tr>
				  <?php
				  $n++;
					   }
					}

					?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
  </section>
 <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  

  <script>
		$(document).ready(function() {
			$('#sachi').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
			} );
		} );
		
				function AddItem() {
		  document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		}
</script>
  

</body>

</html>
