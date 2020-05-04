<?php
include 'connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$qry="update tblcompoff set status='$status' where cId='$id'";
$res=mysql_query($qry);
echo '<script>location.href="admincompoff.php"</script>';
?>