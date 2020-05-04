<?php
include 'connection.php';
include 'empheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Apply Leave Here......</b></h2><br>
            <tr>
                <td><b>Leave Type :</b></td>
                        <td><select name="leave">
                    <?php
                    $qry="select * from tblleave where status='1'";
                    $res=mysql_query($qry);
                    while ($row=mysql_fetch_array($res))
                    {
                        echo '<option value='.$row['lId'].'>'.$row['leaveType'].'</option>';
                    }
                    ?>
                    </select></td>
            </tr>
             <tr>
                 <td><b> Start Date :</b></td>
                 <td><input type="date" name="sdate" id="sdate" onchange="check()" required="" class="form-control"/></td>
            </tr>
            <tr>
                 <td><b> End Date :</b></td>
                 <td><input type="date" name="edate" id="edate" onchange="ddif()" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Days :</b></td>
                <td><input type="text" name="days" id="days" readonly="" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Comments :</b></td>
                <td><textarea name="comments" class="form-control"></textarea></td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
    
    <br><table border="1" align="center">
        <tr>
            
            
            <th>START DATE</th>
            <th>END DATE</th>
            <th>LEAVE TYPE</th>
            <th>DAYS</th>
            <th>COMMENTS</th>
            <th>STATUS</th>
        </tr>
        
        <?php
        session_start();
        $email=$_SESSION['email'];
        $qry="select tblleaveapplied.sDate,tblleaveapplied.eDate,tblleave.leaveType,tblleaveapplied.noDays,tblleaveapplied.comment,tblleaveapplied.status from tblleaveapplied,tblleave where tblleaveapplied.lid=tblleave.lId and tblleaveapplied.eEmail='$email'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['sDate'].'</td>';
            echo '<td>'.$row['eDate'].'</td>';
            echo '<td>'.$row['leaveType'].'</td>';
            echo '<td>'.$row['noDays'].'</td>';
            echo '<td>'.$row['comment'].'</td>';
            echo '<td>'.$row['status'].'</td>';
            echo '</tr>';
        }
        ?>
        
    </table>
            </form>
<script>
        function check(){
          
            debugger;
       
        var d2= new Date(document.getElementById('sdate').value);
        var d=new Date();
        if(d2<d)
        {
            alert('Please check the date');
            document.getElementById('sdate').value="";
        }
    }
        function ddif(){
          
            debugger;
        var d1= new Date(document.getElementById('edate').value);
        var d2= new Date(document.getElementById('sdate').value);
        var d=new Date();
        if(d1<d)
        {
            alert('Please check the date');
            document.getElementById('edate').value="";
        }
        else
        {
        if(d2>d1)
        {
            alert('Please check the date');
            document.getElementById('edate').value="";
            document.getElementById('sdate').value="";
        }
        else
        {
        var diff = d1.getTime() - d2.getTime(); 
        var dd = diff / (1000 * 3600 * 24); 
        document.getElementById('days').value=dd+1;
    }
    }
        }
    
        </script>
<?php  
          
          if (isset($_POST['submit'])){
  
              session_start();
              $email=$_SESSION["email"];
   $leave=$_POST['leave'];
   $sdate=$_POST['sdate'];
   $edate=$_POST['edate'];
   $days=$_POST['days'];
   $comments=$_POST['comments'];
   
   
   $qry="select count(*) from tblleaveapplied where lcase(eEmail)='$email' and (sDate between '$sdate' and '$edate') and (eDate between '$sdate' and '$edate')";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" You have already applied for the leave ....");</script>';
       
   }else{
       
   $qry1="insert into tblleaveapplied(eEmail,lid,sDate,eDate,noDays,appliedDate,comment,status)values('$email','$leave','$sdate','$edate','$days',(select sysdate()),'$comments','applied')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Leave applied ....");</script>';
       echo '<script>location.href="empleaveapply.php"</script>';
   }
   else
       echo $qry1;
   
}
}
?>




