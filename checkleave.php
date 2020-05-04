<?php
include 'connection.php';
$dd=$_GET['dd'];
session_start();
$email=$_SESSION['email'];
$qry="select count(*) from tblleavedates where eEmail='$email' and lDate='$dd'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
if($row[0]==0)
    echo "0";
else {
    echo "1";
}
?>