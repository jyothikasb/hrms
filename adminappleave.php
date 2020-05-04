<?php
include 'connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$qry="update tblleaveapplied set status='$status' where leaveId='$id'";
$res=mysql_query($qry);
if($status=="approved")
{
    $q="select * from tblleaveapplied where leaveId='$id'";
    $r=mysql_query($q);
    $rw=mysql_fetch_array($r);
    $email=$rw['eEmail'];
    $sdate=$rw['sDate'];
    $edate=$rw['eDate'];
    $qq="select DATEDIFF('$edate','$sdate')";
    $rr=mysql_query($qq);
    $rw1=mysql_fetch_array($rr);
    echo $rw1[0];
    echo $edate;
    echo $sdate;
    for($i=0;$i<=$rw1[0];$i++)
    {
        $q2="insert into tblleavedates (eEmail,lDate) values('$email',(SELECT DATE_ADD('$sdate', INTERVAL '$i' DAY)))";
        $r2=mysql_query($q2);
        echo 'Hai';
    }
}
echo '<script>location.href="adminapproveleave.php"</script>';
?>