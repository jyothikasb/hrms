<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
    <br><table border="1" align="center">
        <tr>
            
            <th>EMPLOYEE</th>
            <th>DATE</th>
            <th colspan="3">LEAVE TYPE</th>
    
            
        </tr>
        
        <?php
        $qry="select tblcompoff.cId,tblemployee.eName,tblcompoff.cDate,tblcompoff.cType from tblcompoff,tblemployee "
                . "where tblcompoff.eEmail=tblemployee.eEmail and tblcompoff.status='applied'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['eName'].'</td>';
            echo '<td>'.$row['cDate'].'</td>';
            echo '<td>'.$row['cType'].'</td>';

            echo '<td><a href="adminappoff.php?id='.$row['cId'].'&status=approved">Approve</a></td>';
            echo '<td><a href="adminappoff.php?id='.$row['cId'].'&status=rejected">Reject</a></td>';
            echo '</tr>';
        }
        ?>
        
    </table>
            </form>

