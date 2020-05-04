<?php
include 'connection.php';
session_start();
$email=$_SESSION['email'];
$t=date("h:i:sa");
$qry="update tbllog set logout='$t' where eEmail='$email' and lDate=(select sysdate())";
$res=mysql_query($qry);
echo '<script>location.href="index.php"</script>';
echo $qry;
?>
