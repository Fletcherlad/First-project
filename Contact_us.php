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


?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Repaper</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Delius" rel="stylesheet">
<link rel="stylesheet" href="FA/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
<script type="text/javascript" src="save_details.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div class="bg1">
  <body  style="background-image:url(bgq.jpeg);">
  <div class="container-fluid xe">
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
    <li class="dab"><?php if($_SESSION['id']!=""){echo "Welcome,&nbsp",$_SESSION['id'];} ?></li>
       
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


  <div class="content">
        
        <div class="grid">
          <figure class="effect-max">
            <img src="narayan.jpg" alt="img12"/>
            <figcaption>
              <div>
                <h2>Narayan <span>Mundhara</span></h2>
                <p><font color="black"><b>H.R. Manager</b></font></p>
              </div>
            
            </figcaption>     
          </figure>
          <figure class="effect-max">
            <img src="keyur.jpg" alt="img1"/>
            <figcaption>
              <div>
                <h2>Keyur<span><br>Prabhu</span></h2>
                <p>Finance Manager</p>
              </div>
              
            </figcaption>     
          </figure>
          <figure class="effect-max">
            <img src="vinit.jpg" alt="img1"/>
            <figcaption>
              <div>
                <h2>Vinit<span><br>Pawar</span></h2>
                <p>Service and Transport Manager</p>
              </div>
              
            </figcaption>     
          </figure>
        
       </div></div></div> 
       <button style="margin-left: 260px;" class="btn btn-primary"" name="buy" data-toggle="modal" data-target="#DetailsModal1">More Details</button><button style="margin-left: 220px;" class="btn btn-primary"" name="buy" data-toggle="modal" data-target="#DetailsModal2">More Details</button><button style="margin-left: 220px;" class="btn btn-primary"" name="buy" data-toggle="modal" data-target="#DetailsModal3">More Details</button></div>
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
<!--Login Modal ends-->
<!--Login Modal ends-->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<!-- Modal -->
  <div class="modal fade" id="DetailsModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="lol" > <img src="narayan.jpg"></div>
          <h3 class="modal-title"  >Narayan Mundhara</h3>
          
          <h5 ><b>Co Founder,<br><br> Repaper<br></b> </h5><h6><b>(Established in 2014)</b></h6>
              
        </div>


        <div class="modal-body acc"> 
        <h3>"Let's give our children a greener globe"</h3>
        
        
        <ul class="right">
        <li><h4>Listed in top 25 entrepreneurs under 25.</h4></li>
        <li><h4>Featured in cover magazine for Entrepreneurs.</h4></li>
        <li><h4>Wrote "My Success Story", a bestseller.</h4></li>

          


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="DetailsModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="lol" > <img src="keyur.jpg"></div>
          <h3 class="modal-title">Keyur Prabhu</h3>
          <h5><b>Co Founder,<br><br> Repaper<br></b> </h5><h6><b>(Established in 2014)</b></h6>
    
        </div>
        <div class="modal-body acc">
        <h3>"We are trying to be the wings the world needs"</h3>
        <ul class="right">
        
      
        <li><h4>Has had a 12 year long career in the corporate world working with Deloitte and JPMC.</h4></li>
        <li><h4>Featured in cover magazine for Entrepreneurs.</h4></li>
        <li><h4>Co Founded Repaper with Narayan and handles Finance for the company.</h4></li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <div class="modal fade" id="DetailsModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="lol" > <img src="vinit.jpg"></div>
          <h3 class="modal-title">Vinit Pawar</h3>
          <h5><b>Transport Manager,<br><br> Repaper<br></b> </h5><h6><b>(Established in 2014)</b></h6>
    
        </div>
        <div class="modal-body acc">
        <h3>"Delivering a better world"</h3>
        <ul class="right">
        <li><h4>Founder of the delivery service On The Go.</h4></li>
        
        <li><h4>Merged it with Repaper in a 22 lakh rupee deal and became CEO, Deliveries.</h4></li>
        <li><h4>Featured in cover magazine for Entrepreneurs.</h4></li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>