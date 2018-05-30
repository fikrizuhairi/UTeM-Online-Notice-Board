<?php 
session_start();
include('../connection.php');
$admin= $_SESSION['admin'];
if($admin=="")
{
header('location:login.php');
}
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

    <title>UTeM Online Notice Board Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <link href="../css/custom.css" rel="stylesheet">

  
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
          <a class="navbar-brand" href="#">Welcome Admin !</a>
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
      
      
            <li><a href="#"><img src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
      
      
      
      
      <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=manage_users"><span class="glyphicon glyphicon-user"></span> Manage Users</a></li>
       <li><a href="index.php?page=notification"><span class="glyphicon glyphicon-envelope"></span> Manage  Notification</a></li>
       <li><a href="index.php?page=report"><span class="glyphicon glyphicon-chart"></span> Chart </a></li>
          <form action="search.php" method="GET">
  <input type="text" name="find" placeholder="Search..">
  <input type="submit" name="view1" value="Search">
</form>
  
          </ul>
          
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
      <?php 
    @$page=  $_GET['page'];
      if($page!="")
      {
        if($page=="manage_users")
      {
        include('manage_users.php');
      
      }
      
      if($page=="update_password")
      {
        include('update_password.php');
      
      }
      
      
      
      if($page=="update_notice")
      {
        include('update_notice.php');
      
      }
      
      
      
      if($page=="add_notice")
      {
        include('add_notice.php');
      
      }
      }
      
      else
      {
      ?>
      <!-- container end-->
      
      
    
      
      <h1 class="page-header">Dashboard</h1>
      
            
          
<?php

 $search=$_GET['find'];
 
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
