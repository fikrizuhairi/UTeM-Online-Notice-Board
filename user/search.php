<?php 
session_start();
include('../connection.php');
$user= $_SESSION['user'];
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Online Notice Board User Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

 

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">



  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hello <?php echo $users['name'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
            <!-- find users' image if image not found then show dummy image -->
            
            <!-- check users profile image -->
            <?php 
            $q=mysqli_query($conn,"select image from user where email='".$_SESSION['user']."'");
            $row=mysqli_fetch_assoc($q);
            if($row['image']=="")
            {
            ?>
            <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here" style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
            <?php 
            }
            else
            {
            ?>
            <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here"  style="border-radius:50px" src="../images/<?php echo $_SESSION['user'];?>/<?php echo $row['image'];?>" width="100" height="100" alt="not found"/></a></li>
            <?php 
            }
            ?>
            
            
            
            <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-user"></span> Update Profile</a></li>
             <li><a href="index.php?page=notification"><span class="glyphicon glyphicon-envelope"></span> Notification</a></li>
             <?php
$connect = mysqli_connect("localhost", "root", "", "bengkel" );
$query = "SELECT description, count(*)  From notice GROUP BY description";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html>
<head>
<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body>


<form action="search.php" method="GET">
  <input type="text" name="search" placeholder="Search..">
  <input type="submit" name="view1" value="Search">
</form>

</body>
</html>

            
          </ul>
         

         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
          <?php 
        @$page=  $_GET['page'];
          if($page!="")
          {
            if($page=="update_password")
            {
                include('update_password.php');
            
            }
            
            
            
            if($page=="update_profile")
            {
                include('update_profile.php');
            
            }
            if($page=="update_profile_pic")
            {
                include('update_profile_pic.php');
            
            }
          }
          else
          {
          
          ?>
          <!-- container end-->
           
          
          <h1 class="page-header">Dashboard</h1>

          
          
<?php $search=$_GET['search'];

} ?>
<?php 
$q=mysqli_query($conn,"select * from notice where subject like '%$search%' or Description like '%$search%'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any notice for You !!!</h2>";
}
else
{
?>
<h2>All Notification</h2>

<table class="table table-bordered">
    <Tr class="success">
        <th>Sr.No</th>
        <th>Subject</th>
        <th>Details</th>
        <th>Date</th>
        </Tr>
        <?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['subject']."</td>";
echo "<td>".$row['Description']."</td>";
echo "<td>".$row['Date']."</td>";

echo "</Tr>";
$i++;
}
        ?>
        
</table>
<?php }?>
          
         
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/vendor/holder.min.js"></script>

  </body>

 </html>
