

<html>
 <head>
  <script type='text/javascript' src='JS_FILES/infographic.min.js'
  </head>

 <?php
$connect = mysqli_connect("localhost", "root", "", "bengkel" );
$query = "SELECT gender, count(*) as number From user GROUP BY gender";
$result = mysqli_query($connect, $query);
echo "<infographic-piechart  width='500'  height='500'>\n";
echo "<infographic-data>\n";
while ($row = mysql_fetch_array($result)) {
    echo "<infographic-pieslice value='" . 
         $row['gender'] . "'>" . 
         $row['gender'] . 
         "</infographic-pieslice>\n";
}
echo "<infographic-data>\n";
echo "</infographic-piechart>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($connect);
?>
?>