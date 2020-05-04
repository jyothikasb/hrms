<?php
include 'connection.php';
include 'empheader.php'
?>
<table border="1" align="center">
        <tr>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>SHIFT TIME</th>
            
           
        </tr>
        <?php
session_start();
$email=$_SESSION['email'];
        $qry="select * from tblshift where eEmail='$email' order by shiftId desc";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['dFrom'].'</td>';
            echo '<td>'.$row['dTo'].'</td>';
            echo '<td>'.$row['shift'].'</td>';
            
            echo '</tr>';
        }
        
        ?>
    </table>




