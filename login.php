<!DOCTYPE html>
<?php
session_start();
include 'connection.php';

if (isset($_SESSION['userid'])) 
{
header("location:index.php");
}

if (isset($_POST['login'])) 
{
    $accountlist = $dbConn->query("SELECT * FROM tbl_users where username = '".$_POST['username']."' AND password = '".$_POST['password']."' ");
    if($accountlist->rowCount() > 0 ) 
    {
        $getaccount = $accountlist->fetch(PDO::FETCH_ASSOC);

        if ($getaccount['status'] == 'active') 
        {
            $_SESSION['userid'] = $getaccount['id'];
            $_SESSION['fullname'] = ucfirst($getaccount['firstname']).' '.ucfirst($getaccount['lastname']);
            $_SESSION['type'] = $getaccount['type'];
            $_SESSION['current'] = 'dashboard';
            header("location:index.php");
        }
        else
        {
            $errormsg = '<div class="alert alert-block alert-danger fade in">
                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <strong>Error!</strong> Youre account is not active anymore .</div>';
        }

    }
    else
    {
        $errormsg = '<div class="alert alert-block alert-danger fade in">
                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <strong>Invalid!</strong> Please Try Again.</div>';
    }
}
?>
<html>

<!-- Mirrored from www.riaxe.com/marketplace/thin-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2016 01:09:14 GMT -->
<head>
<title>Bebong Cakeshop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/thin-admin.css" rel="stylesheet" media="screen">
<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="style/style.css" rel="stylesheet">



</head>
<body>
<div class="login-logo">

    </div>

<div class="widget">
<div class="login-content">
  <div class="widget-content" style="padding-bottom:0;">
  <form method="post" class="no-margin">
                <h3 class="form-title">Login to your account</h3>
                <?php echo isset($errormsg) ? $errormsg : '';
                unset($errormsg); ?>
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="username">Username</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                            <input type="tex" name="username" placeholder="Your Username" class="form-control input-lg" id="username">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                            <input type="password" name="password" placeholder="Your Password" class="form-control input-lg" id="password">
                        </div>

                    </div>
                </fieldset>
               <div class="form-actions">				
               <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>        
			</div>
            
            
            </form>
  
  
  </div>
   </div>
</div>








<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 



 

<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
                <div class="demo-icon"></div>
                <div class="form_holder">
                        

                    <div class="predefined_styles">
                        <a class="styleswitch" rel="a" href="#"><img alt="" src="images/a.jpg"></a>	
                        <a class="styleswitch" rel="b" href="#"><img alt="" src="images/b.jpg"></a>
                        <a class="styleswitch" rel="c" href="#"><img alt="" src="images/c.jpg"></a>
                        <a class="styleswitch" rel="d" href="#"><img alt="" src="images/d.jpg"></a>
                        <a class="styleswitch" rel="e" href="#"><img alt="" src="images/e.jpg"></a>
                        <a class="styleswitch" rel="f" href="#"><img alt="" src="images/f.jpg"></a>
                        <a class="styleswitch" rel="g" href="#"><img alt="" src="images/g.jpg"></a>
                        <a class="styleswitch" rel="h" href="#"><img alt="" src="images/h.jpg"></a>
                        <a class="styleswitch" rel="i" href="#"><img alt="" src="images/i.jpg"></a>
                        <a class="styleswitch" rel="j" href="#"><img alt="" src="images/j.jpg"></a>
                    </div>
					                    
                </div>
            </div>
            
            
    <!--switcher html end-->
<script src="assets/switcher/switcher.js"></script> 
<script src="assets/switcher/moderziner.custom.js"></script> 
<link href="assets/switcher/switcher.css" rel="stylesheet">
<link href="assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/j.css" title="j" media="all" />

</body>

<!-- Mirrored from www.riaxe.com/marketplace/thin-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2016 01:09:14 GMT -->
</html>
