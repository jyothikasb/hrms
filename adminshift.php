<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Add Shift Details......</b></h2><br>
            <tr>
                <td><b>Employee :</b></td>
                <td><select name="emp">
                    <?php
                    $qry="select * from tblemployee where eEmail in(select uname from tbllogin where status='active')";
                    $res=mysql_query($qry);
                    while ($row=mysql_fetch_array($res))
                    {
                        echo '<option value="'.$row['eEmail'].'">'.$row['eName'].'</option>';
                    }
                    ?>
                    </select></td>
            </tr>
            
           
             
             <tr>
                <td><b>Date from :</b></td>
                <td><input type="date" name="dFrom" required="" class="form-control"/></td>
            </tr>
         
             <tr>
                <td><b>Date to :</b></td>
                <td><input type="date" name="dTo" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Shift time :</b></td>
                <td><input type="text" name="shift" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
   
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
   $emp=$_POST['emp'];
   $dFrom=$_POST['dFrom'];
   $dTo=$_POST['dTo'];
   $shift=$_POST['shift'];
   
   
   $qry1="insert into tblshift(eEmail,dFrom,dTo,shift)values('$emp','$dFrom','$dTo','$shift')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Shift added ....");</script>';
       echo '<script>location.href="adminshift.php"</script>';
   }
   else
       echo $qry1;
   
}

?>




