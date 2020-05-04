<?php //
include 'connection.php';
include 'empheader.php';
session_start();
$email=$_SESSION['email'];
$qry="select * from tblemployee where lcase(eEmail)='$email'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
echo '<h1>Hello '.$row['eName'].'</h1>';
?>