<?php
include 'connection.php';
include 'empheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        

    <br><table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>LEAVE TYPE</th><th>DESCRIPTION</th>
            <th>DAYS ALLOWED</th>
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
            echo '</tr>';
        }
        
        ?>
    </table>
            </form>
