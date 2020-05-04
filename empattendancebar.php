<?php
include 'connection.php';
include 'empheader.php';
session_start();
$email=$_SESSION['email'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Attendance</h2>
  <?php
  $qry="select distinct(lDate) from tbllog  where eEmail='$email' and lDate between '2020-05-01' and '2020-05-31'";
$res=mysql_query($qry);
 while ($row=mysql_fetch_array($res))
 {
     echo $row[0];
  echo '<div class="progress" style="width:450px;">';
    echo '<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color:green;"> 100%';
      echo '<span class="sr-only"></span>';
    echo '</div>';
  echo '</div>';
 }
          ?>
</div>

</body>
</html>
