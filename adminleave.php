<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Add Leave Type Here......</b></h2><br>
            <tr>
                <td><b>Leave Type :</b></td>
                <td><input type="text" name="leave" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td><b> Description :</b></td>
                 <td><textarea name="desc" class="form-control"></textarea></td>
            </tr>
           
             
             <tr>
                <td><b>Days allowed :</b></td>
                <td><input type="text" name="days" required="" class="form-control"/></td>
            </tr>
         
            
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
    <br><table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>LEAVE TYPE</th>
       <th>DESCRIPTION</th>
            
            <th colspan="2">DAYS ALLOWED</th>
        </tr>
        <?php

        $qry="select * from tblleave where status='1'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['lId'].'</td>';
            echo '<td>'.$row['leaveType'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['daysAllowed'].'</td>';
            echo '<td><a href="admindeleteleave.php?id='.$row['lId'].'">Delete</a></td>';
            echo '</tr>';
        }
        
        ?>
    </table>
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
   $leave=$_POST['leave'];
   $desc=$_POST['desc'];
   $days=$_POST['days'];
   
   
   $qry="select count(*) from tblleave where lcase(leaveType)='$leave'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" Already added ....");</script>';
       
   }else{
       
   $qry1="insert into tblleave(leaveType,description,daysAllowed,status)values('$leave','$desc','$days','1')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Leave type added ....");</script>';
       echo '<script>location.href="adminleave.php"</script>';
   }
   else
       echo $qry1;
   
}
}
?>




