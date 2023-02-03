<?php
session_start();  
include 'connection.php'; 
 if(isset($_POST["log"]))  
      {  
           if(empty($_POST["Status"]) AND  empty($_POST["Password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
				
                $query = "SELECT * FROM login WHERE Status = :Status AND Password = :Password";  
                $statement = $con->prepare($query);  
                $statement->execute(  
                     array(  
                          'Status'     =>  $_POST["Status"],  
                          'Password'     =>  Sha1($_POST["Password"]) 
                     )  
                );  
                $count = $statement->rowCount();
								
                if($count > 0){
				$rol=$statement->fetch(PDO::FETCH_ASSOC);
				if($rol["Status"] =='manager'){
                     $_SESSION["Status"] = $_POST["Status"];  
                     $_SESSION["user"] = $rol["User_ID"];   
					header("location:View_customer.php");  
				} 
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }

 ?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Manager Registration</title>
  <!-- kwa ajl ya kuweka icon juu -->
  <link rel="icon" type="image/png" href="p11.png"/>
  
  <!-- css -->
   <!--  -->
   <!--  hii ndo kwa ajl ya kuweka bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
   <!-- kwa ajil ya kumake movent -->
  <link href="css/animate.css" rel="stylesheet" />
   <!-- hii ni kwaajil ya kupangilia kuzr login page yangu -->
  <link href="css/style.css" rel="stylesheet">
   <!-- Hii nikwaajili ya kuweka color katifa login part -->
  <link href="log.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  
  <!-- hii ndo kwajili ya kuweka rangi ya bluee bahari iliyo kusanya contact and Monday -->
  <link id="t-colors" href="color/default.css" rel="stylesheet">

  <!-- 	=======================================================

		======================================================= -->
	<style>
		#body{
			margin-left:30px;
			border-radius:150px;
		}
	</style>
</head>


  <div id="wrapper">

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background-image:url(p11.png)";>
<br><br><br><br><br><br><br><br>
  <div id="wrapper">

    <!-- Section: intro -->
    <section id="intro" class="intro">
	<div class="col-lg-3">
	</div>
      <div class="intro-content">
        <div class="container">
          <div class="row">
           
			<div class="col-lg-6">
              <div class="form-wrapper" >
                
                  <div class="kulia"id="body">
				  <div class="panel panel-skin">
                    <div style="background-color:#f8f9f9"  class="panel-heading">
                      <h2 class="panel-title"><span class="fa fa-pencil-square-o"></span> Login </h2>
					  
                    </div>
					
                    <div style="background-color:#f8f9f9" class="panel-body" id="log">
                      <div id="sendmessage"></div>
                      <div id="errormessage"></div>

                      <form action="" style="background-color: #008080" method="POST" class="form-horizontal"style="background:#8ecef9 ;" >
                        <div class="row">
						<center><h3 style="color: #FFFFFF"><b>YUNUS SPICE SYSTEM</b></h3></center>
						<br>
						<div class="form-group">
						<div class="col-sm-3"></div>
							<label class="control-label col-sm-1"><i class="glyphicon glyphicon-user"></i></label>
							<div class="col-sm-5">
							<input type="text" name="Status" id="Username" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" placeholder="Enter Username Here" autocomplete="off" required >
                              <div class="validation"></div>
                            
							</div>
						  </div>
						  
						  <div class="form-group">
							<div class="col-sm-3"></div> 
							<label class="control-label col-sm-1"> <i class="glyphicon glyphicon-lock"></i></label>
							<div class="col-sm-5">
							<input type="password" name="Password" id="Password" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" placeholder="Enter Password Here" required >
							 <div class="validation"></div>
                            </div>
							</div>

						<br>
                        <div class="row">
						<div class="col-sm-2"></div> 
							<div class="col-sm-2 form-group">
							</div>
							<div class="col-sm-3 form-group">
								<input type="submit" value="Login" name="log" class="btn btn-skin btn-block btn-md"> 
							</div>
							
							
							<div class="col-sm-1 form-group">	
							</div>
							<div class="col-sm-3 form-group">
							<input type="reset" value="Cancel" name="clear" class="btn btn-danger btn-block btn-md"> 
							
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 form-group">
							</div>
							<div class="col-sm-3 form-group">
								
							</div>
							
							<div class="col-sm-3 form-group">
								
							</div>
							
						</div>
     
                      </form>
                    </div>
                  </div>

                </div>
				</center>
				</div>
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

       

  </div>
  <!--- hii ni kama error imekaa chini kabsa kama vile expand sysmbol-->
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <!----->
<!-- hii inazuia page kutofanya animation--->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/jquery.easing.min.js"></script>
  <!-- hii inasaidia kuweza kufanya page ifunction inavyo takiwa--->
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <!--hii pia inapelekea kuzuia kwa animation-->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  
  <!--ni sizo ziandikia comment kuzitowa hazileti change au haiathir kitu-->
</body>

</html>
