<?php
include 'connection.php';
include 'empheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Apply Compensation Off Here......</b></h2><br>
            <tr>
                <td><b>Leave Type :</b></td>
                        <td><select name="leave">
                                <option>Compensation Off</option>
                                <option>Credit Off</option>
                    </select></td>
            </tr>
             <tr>
                 <td><b> Select Date :</b></td>
                 <td><input type="date" name="sdate" id="sdate" onchange="ddif()" required="" class="form-control"/></td>
            </tr>
            
            <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
    
    <br><table border="1" align="center">
        <tr>
            
            
            <th>TYPE</th>
            <th>DATE</th>
           
            <th>STATUS</th>
        </tr>
        <?php
        session_start();
        $email=$_SESSION['email'];
        $qry="select * from tblcompoff where eEmail='$email'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['cType'].'</td>';
            echo '<td>'.$row['cDate'].'</td>';
           
            echo '<td>'.$row['status'].'</td>';
            echo '</tr>';
        }
        
        ?>
    </table>
            </form>
<script>
        
        function ddif(){
            debugger;
        var d1= (new Date(document.getElementById('sdate').value)).getDay();
       if(d1>1 && d1<7)
           alert('Compensation off is not valid for this date');
    }
        </script>
        
        
        
       
<?php  
          
          if (isset($_POST['submit'])){
  
              session_start();
              $email=$_SESSION["email"];
   $leave=$_POST['leave'];
   $sdate=$_POST['sdate'];
   
   
   
   $qry="select count(*) from tblcompoff where lcase(eEmail)='$email' and cDate = '$sdate'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" You have already applied for the leave ....");</script>';
       
   }else{
       
   $qry1="insert into tblcompoff(eEmail,cType,cDate,status)values('$email','$leave','$sdate','applied')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Leave applied ....");</script>';
       echo '<script>location.href="empcompoff.php"</script>';
   }
   else
       echo $qry1;
   
}
}
?>




