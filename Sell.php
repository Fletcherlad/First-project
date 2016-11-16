<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  
   
   session_start();

   
  

   if( isset( $_SESSION['counter'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
  
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";


//connect to mysql database
$connection = mysqli_connect("localhost","root","","users_repaper") or die("Error " . mysqli_error($connection));

if(isset($_POST['reg_sub']))
{   
  $userfname= $_POST['fname'];
  $userlname= $_POST['lname'];
  $useremail= $_POST['mail'];
  $userpass= $_POST['pwd'];
  $userphn=$_POST['phone'];
  $qry3="SELECT email FROM login_users WHERE email='$useremail'";
  $res3=mysqli_query($connection,$qry3);
  $row3=mysqli_fetch_assoc($res3);
if($row3['email']==$useremail) { echo '<script type="text/javascript">alert("Email already registered");</script>';
  $qry="INSERT INTO login_users(password,fname,lname,email,phone_no) VALUES('$userpass','$userfname','$userlname','$useremail','$userphn')";}

  if(mysqli_query($connection, $qry))
  { echo '<script type="text/javascript">alert("Registration Done")</script>';
    echo '<script>window.open("index.php","_self")</script>';


}
}
if(isset($_POST['log_sub']))
{
  $error='';
  $unm=$_POST['exampleInputEmail1'];
  $upass=$_POST['exampleInputPassword1'];
  $qry2="SELECT password FROM login_users WHERE email='$unm'";
  $firstn="SELECT fname FROM login_users WHERE email='$unm'";
  $res=mysqli_query($connection,$qry2);
  $row=mysqli_fetch_assoc($res);
  $res1=mysqli_query($connection,$firstn);
 $row1=mysqli_fetch_assoc($res1);
  if (empty($_POST['exampleInputEmail1']) || empty($_POST['exampleInputPassword1']))
  { $error = "Username or Password is invalid";}
  if($row['password']==$upass){ echo '<script type="text/javascript">alert("logged in");</script>';
  $_SESSION['id']=$row1['fname'];}
  else { echo '<script type="text/javascript">alert("Username or Password is invalid");</script>';}

  
}

if($_SESSION['id']!=""){
  if(isset($_POST['sell1_sub'])){
  $C_name= $_SESSION['id'];
  $C_id=$_SESSION['lol'];
  $Service="Sell";
  $Code= "S1001";
  $Quantity= $_POST['quantity'];
   $date1 = date('Y-m-d H:i:s');

 
   $qry="INSERT INTO transport_details(C_id,C_name,Service,Code,Quantity,O_date) VALUES('$C_id','$C_name','$Service','$Code','$Quantity','$date1')";
 if(mysqli_query($connection,$qry))
  { echo '<script type="text/javascript">alert(" Done")</script>';
    echo '<script>window.open("sell.php","_self")</script>';
  }
  }
}

if($_SESSION['id']!=""){
  if(isset($_POST['sell2_sub'])){
    $C_id=$_SESSION['lol'];
  $C_name= $_SESSION['id'];
  $Service="Sell";
  $Code= "S1002";
  $Quantity= $_POST['quantity'];
$date1 = date('Y-m-d H:i:s');
 
 $qry="INSERT INTO transport_details(C_id,C_name,Service,Code,Quantity,O_date) VALUES('$C_id','$C_name','$Service','$Code','$Quantity','$date1')";
 if(mysqli_query($connection,$qry))
  { echo '<script type="text/javascript">alert(" Done")</script>';
    echo '<script>window.open("sell.php","_self")</script>';
  }
  }
}

?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Repaper Sell</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Delius" rel="stylesheet">
<link rel="stylesheet" href="FA/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="save_details.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-fluid">
<nav class="navbar navbar-default up_nav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">--&gt;RepapeR&lt;--</a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <ul class="nav navbar-nav navbar-right navtile">
      <li class="dab"><?php if($_SESSION['id']!=""){echo "Welcome,&nbsp",$_SESSION['id'];} ?></button></li>
       
        <li class= "menu1"><a href="index.php">Home</a></li>
        <li class= "menu1"><a href="Contact_us.php">Contact Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="buy.php">Buy</a></li>
            <li><a href="Sell.php">Sell</a></li>
          </ul>
        </li>
        <li><button class="btn regsign menu1"  data-toggle="modal" data-target="#signupModal">Register</button></li>
        <li><button class="btn regsign menu1"  data-toggle="modal" data-target="#loginModal">Sign In</button></li>
        <li class= "menu1"><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class= "jumbotron">
  <div class="container">
    <div class="row slogan">
      <div class="col-lg-12">
        <h1>REUSE REDUCE RECYCLE</h1>
      </div>
    </div>
  </div>
</div>

<div class="sell_area">
<div class="container">

  <button type="button" class="btn btn-primary beta btn-huge btn-lg" data-toggle="modal" data-target="#SellModal1"><h1>Sell</h1><h5>Magazine Paper</h5></button>

  <button type="button" class="btn btn-primary beta btn-huge btn-lg" data-toggle="modal" data-target="#SellModal2"><h1>Sell</h1><h5>Normal Paper</h5></button>


</div>

</div>


</div>
 <div class="contact">
  <p>Follow us on:</p>
  <ul class="social_links">
     <li><a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></li>
    <li><a href="https://www.twitter.com"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
    <li><a href="https://plus.google.com"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a></li>
    <li><a href="https://www.instagram.com"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
  </ul>
  <p style="color:#b3b3b3; font-size:10px; margin-top:15px;">&copy;2016 RepapeR All Rights Reserved</p>
</div>
</div>

<!--modal for Sign Up-->
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <!--Sign up form-->
          <form id="signupForm" action='index.php' method="POST">
            <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" aria-describedby="name-format" required aria-required=”true” pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+">
        </div>

        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last Name"aria-describedby="name-format" required aria-required=”true” pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+">
        </div>

        <div class="form-group">
          <label for="mail">Email-id:</label>
          <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter Email Id" required aria-required=”true” >
        </div>

        <div class="form-group">
          <label for="address">Address:</label>
          <textarea class="form-control" id="address" name="address" cols="25" rows="5"></textarea>
        </div>

        <div class="form-group">
          <label for="phone">Phone number:</label>
          <input type="text" class="form-control" id="phone" name="phone" required aria-required=”true” placeholder="Phone Number">
        </div>

        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="pwd" required aria-required=”true” placeholder="Enter Password">
        </div>

        <div class="form-group">
          <label for="cpwd">Confirm Password:</label>
          <input type="password" class="form-control" id="cpwd" name="cpwd" required aria-required=”true” placeholder="Enter Password Again">
        </div>

        <div id="status"></div>
           <div class="modal-footer">
           <button type="submit"  name='reg_sub' class=" btn btn-primary" href="javascript:void(0);" onclick="register_details();">Sign Up</button>
             
          </div>
          </form>
        <!--Sign up form ends-->
       </div>
    </div>
    </div>
    </div>
<!--Sign up modal ends-->
<!--modal for login-->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <!--login form-->
         <form id="LoginForm" action='index.php' method="POST">
           <div class="form-group">
       <label for="exampleInputEmail1">Email address:</label>
       <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" required aria-required=”true” placeholder="Email">
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">Password:</label>
       <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" required aria-required=”true” placeholder="Password">
     </div>
     <div class="modal-footer">

        <input type="submit" name='log_sub' class="btn btn-primary" value="log in" >
      </div>
         </form>
        <!--login form ends-->
      </div>

     
    </div>

  </div>
</div>

<div id="SellModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Sell</h3>
      </div>
      <div class="modal-body">
        <!--sell form-->
         <form id="SellForm" action="Sell.php" method="POST">
        
     <div class="form-group">
       <label for="qpaper">Quantity</label>
       <input type="text" class="form-control" id="qpaper" name="quantity" placeholder="Quantity in Kg" pattern="[0-9]{1,10}">
     </div>
         
        <!--sell form ends-->
      
      <div class="modal-footer">
        <button type="submit" name="sell1_sub" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
</div>
  </div>
</div>

<div id="SellModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Sell</h3>
      </div>
      <div class="modal-body">
        <!--sell form-->
         <form id="SellForm" action="Sell.php" method="POST">
        
     <div class="form-group">
       <label for="qpaper">Quantity</label>
       <input type="text" class="form-control" id="qpaper" name="quantity" placeholder="Quantity in Kg" pattern="[0-9]{1,10}">
     </div>
         
        <!--sell form ends-->
      
      <div class="modal-footer">
        <button type="submit" name="sell2_sub" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
</div>
  </div>
</div>


<!--Login Modal ends-->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
