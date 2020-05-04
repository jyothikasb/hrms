<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
    <br><table border="1" align="center">
        <tr>
            
            <th>EMPLOYEE</th>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>LEAVE TYPE</th>
            <th>DAYS</th>
            <th colspan="3">COMMENTS</th>
            
        </tr>
        
        <?php
        $qry="select tblleaveapplied.leaveId,tblemployee.eName,tblleaveapplied.sDate,tblleaveapplied.eDate,tblleave.leaveType,tblleaveapplied.noDays,tblleaveapplied.comment,tblleaveapplied.status "
                . "from tblleaveapplied,tblleave,tblemployee "
                . "where tblleaveapplied.lid=tblleave.lId and tblemployee.eEmail=tblleaveapplied.eEmail and tblleaveapplied.status='applied'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['eName'].'</td>';
            echo '<td>'.$row['sDate'].'</td>';
            echo '<td>'.$row['eDate'].'</td>';
            echo '<td>'.$row['leaveType'].'</td>';
            echo '<td>'.$row['noDays'].'</td>';
            echo '<td>'.$row['comment'].'</td>';
            echo '<td><a href="adminappleave.php?id='.$row['leaveId'].'&status=approved">Approve</a></td>';
            echo '<td><a href="adminappleave.php?id='.$row['leaveId'].'&status=rejected">Reject</a></td>';
            echo '</tr>';
        }
        ?>
        
    </table>
            </form>

