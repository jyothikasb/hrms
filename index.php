<?php //
include 'connection.php';
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>EMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        EMS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->

<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Login</b></h2><br>
            <tr>
                <td><b>Email :</b></td>
                <td><input type="email" name="email" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Password :</b></td>
                <td><input type="password" name="pwd" required="" class="form-control"/></td>
            </tr>
           
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="LOGIN" class="btn btn-success"/></td>
            </tr>
    </table>
    
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
  
   $email=$_POST['email'];
   $pwd=$_POST['pwd'];
   
   $qry="select count(*) from tbllogin where lcase(uname)='$email'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    
       $qry="select * from tbllogin where lcase(uname)='$email'";
        $res=mysql_query($qry); 
        $row=mysql_fetch_array($res);
            if($row['pwd']==$pwd)
            {
                session_start();
                $_SESSION['email']=$email;
                if($row['status']=='active')
                {
                    if($row['utype']=='admin')
                        echo '<script>location.href="adminhome.php"</script>';
                    else if($row['utype']=='employee')
                    {
                            $t=date("h:i:sa");
//                            $qry="select count(*) from tbllog where eEmail='$email' and lDate=(select sysdate())";
//                            $res=mysql_query($qry);
//                            $row=mysql_fetch_array($res);
//                            if($row>0)
//                            {
//                                $qry="update tbllog set login='$t' where eEmail='$email' and lDate=(select sysdate())";
//                                $res=mysql_query($qry);
//                                if($res)
////                                    echo '<script>location.href="emphome.php"</script>';
//                                    echo $qry;
//                                else {
//                                    echo $qry;
//                                }
//                            }
//                            else
//                            {
                                $qry="insert into tbllog (eEmail,lDate,login,logout)values('$email',(select sysdate()),'$t','')";
                                $res=mysql_query($qry);
                                if($res)
                                    echo '<script>location.href="emphome.php"</script>';
//                                    echo $qry;
                                else {
                                    echo $qry;
                                }
//                            }
                            
//                          echo 'Hai';
                    }
                    else 
                        echo $row['utype'];
                }
                else{
      
       echo '<script>alert(" Account inactive");</script>';
        
}
            }
            else{
      
       echo '<script>alert(" incorrect password ....");</script>';
        
}
   }
   else{
      
       echo '<script>alert(" User doesnt exist ....");</script>';
        
}
}
?>




