<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="resources/symbol.png">
    <title>dr. X - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->

    <style type="text/css">
        #btn-antri{
            color: white;
        }
        #btn-antri:hover{
            color: black;
        }

        #hover{
            -webkit-transition: margin 1.5s; /* For Safari 3.1 to 6.0 */
            transition: margin 1.5s;
             -webkit-transition: font-size 1.5s; /* For Safari 3.1 to 6.0 */
            transition: font-size 1.5s;
             background-color: green;
            color: white;
             -webkit-transition: background-color 1.5s; /* For Safari 3.1 to 6.0 */
            transition: background-color 1.5s;
             -webkit-transition: color 1.5s; /* For Safari 3.1 to 6.0 */
            transition: color 1.5s;
           
        }
        #hover:hover{
            margin:0px 5%;
            font-size: 150%;
            background-color: lightgreen;
            color: black;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top">
        
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                    
                    <a class="navbar-brand" href="#page-top"  style="margin-top: -10px;"><img src="resources/symbol.png" id="symbol" width="35%" style="margin-bottom: -30%;" ><span style="margin-left: 50%;">dr. X</span></a>
               
                    
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="home.php">Jadwal Praktek</a>
                    </li>
					<li>
                        <a href="profile.php">Profile</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
				<!--li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout </a>
                    <ul class="dropdown-menu dropdown-menu-invert" style="background-color: White;">
                        <li><a href="change_pass.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    </li>
			</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center;">Selamat Datang, <?php echo $_SESSION['user']; ?>!<br>Silahkan Ganti Password Anda
				<h1>
              <!--   <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Contact</li>
                </ol> -->
            </div>
        </div>
		<hr>
		<form method="POST" action="change_pass.php" name="sentMessage" id="contactForm" novalidate>
							

							<div class="control-group form-group">
								<div class="controls">
									<label>Old Password:</label>
									<input type="password" class="form-control" name="old" id="old-pass" required data-validation-required-message="Please enter your email address.">
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>New Password:</label>
									<input type="password" class="form-control" id="new-pass" name="new" required data-validation-required-message="Please enter your password.">
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>Password Confirmation:</label>
									<input type="password" class="form-control" id="pass-conf" name="confirm" required data-validation-required-message="Please confirm your password.">
								</div>
							</div>
						<div id="success"></div>
			<button type="submit" class="btn btn-info" value="update" name="submit"><strong>Save</strong></button>	
		</form>
		<?php
			include 'config.php';
						if(isset($_POST['submit'])){
						$old = isset($_POST['old'])?$_POST['old']:null; 
						$new = isset($_POST['new'])?$_POST['new']:null;
						$confirm = isset($_POST['confirm'])?$_POST['confirm']:null;
						$user = $_SESSION['user'];	
							if($new == $confirm){
								$query="UPDATE pasien SET password_pasien='$new' WHERE username='$user' AND password_pasien='$old'"; 
								$result = mysqli_query($conn,$query);
									if($result === TRUE){
									echo"<script> window.location = 'home.php';
									</script>";
						}}}
		?>
	
	</div>
	
	<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <p>Copyright &copy; 2016 by 311410001 - 311410008 </p>
                </div>
            </div>
        </footer>

    
    <!-- /.container -->

    <!-- toggle swicth -->
   <!--  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script type="text/javascript">
     function timedMsg()
      {
        var t=setInterval("change_time();",1000);
      }
     function change_time()
     {
       var d = new Date();
       var days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
       var curr_day = days[d.getDay()];
       var curr_date_day = d.getDate();
       var curr_date_month = d.getMonth();
       var curr_date_year = d.getYear();
       var curr_hour = d.getHours();
       var curr_min = d.getMinutes();
       var curr_sec = d.getSeconds();
       // if(curr_hour > 12)
       //   curr_hour = curr_hour - 12;
        document.getElementById('Day').innerHTML =curr_day+', ';
        document.getElementById('Date').innerHTML =curr_date_day+'/';
        document.getElementById('Month').innerHTML =curr_date_month+'/';
        document.getElementById('Year').innerHTML =curr_date_year-100+' '+'|'+' ';
        document.getElementById('Hour').innerHTML =curr_hour+':';
        document.getElementById('Minute').innerHTML=curr_min+':';
        document.getElementById('Second').innerHTML=curr_sec;
     }
    timedMsg();   
    </script>
        <script>
        $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    } // End if
});
});
</script>
</body>

</html>
