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
    <title>dr. X</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

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
                
                    
                    <a class="navbar-brand" href="index.php"  style="margin-top: -10px;"><img src="resources/symbol.png" id="symbol" width="35%" style="margin-bottom: -30%;" ><span style="margin-left: 50%;">dr. X</span></a>
               
                    
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
					<li>
                        <a href="jadwal.php">Jadwal Praktek</a>
                    </li>
                    <li class="active">
                        <a href="login.php">Login</a>
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
                <h1 class="page-header" style="text-align: center;">Login <br>
                    <small>Masuk untuk memulai</small>
                </h1>
              <!--   <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Contact</li>
                </ol> -->
            </div>
        </div>
        <!-- /.row -->


        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
			<?php
			include'config.php';
			if (!isset($_POST['submit']))   
			{
			$form=
			<<<batas
	
                <form action="login.php" method="POST" name="sentMessage" id="contactForm">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username:</label>
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="phone" name="pass" required data-validation-required-message="Please enter your password.">
                        </div>
                    </div>
                
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <label style="color: gray;">Belum terdaftar ? <a href="register.php"> Daftar </a></label>
                </form>
batas;
			echo $form;
			}
			else
			{
				$nama=$_POST['name'];
				$pass=$_POST['pass'];
				$query = "SELECT * FROM pasien WHERE username='".$nama."' ";
				$query_admin = "SELECT * FROM admin WHERE nama_admin='".$nama."'";
				$result = mysqli_query($conn,$query);
				$result_admin = mysqli_query($conn,$query_admin);
				if($result)
				{
                $row = mysqli_fetch_row($result);
					if ($row[3] == $pass and $row[1] == $nama)
					{
                    $_SESSION['user']=$nama;
                    $_SESSION['ID']=$row[0];
                    $_SESSION['name']=$row[1];

                    $name = $row[1];
                    // echo"<h3>Welcome ".$name. " !</h3><br>";
                    echo"<script> window.location = 'home.php?name=".$name."';
                    </script>";//name=".$name."
					}
					else 
					{
						$row = mysqli_fetch_row($result_admin);
						if ($row[2] == $pass and $row[1] == $nama)
						{
                        $_SESSION['user']=$nama;
                        $_SESSION['ID']=$row[0];
                        $_SESSION['name']=$row[1];

                        $name = $row[1];
                        // echo"<h3>Welcome ".$name. " !</h3><br>";
                        echo"<script> window.location = 'admin_jadwal.php?name=".$name."';
                        </script>";
						}
						else
						{
						$form=
			<<<batas
	
                <form action="login.php" method="POST" name="sentMessage" id="contactForm">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username:</label>
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="phone" name="pass" required data-validation-required-message="Please enter your password.">
                        </div>
                    </div>
                
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <label style="color: gray;">Belum terdaftar ? <a href="register.php"> Daftar </a></label>
                </form>
batas;
			echo $form;
						}
					}
				}
			}
			?>
            </div>

        </div>
        <!-- /.row --> 

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <p>Copyright &copy; 2016 by 311410001 - 311410008 </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

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

</body>

</html>
