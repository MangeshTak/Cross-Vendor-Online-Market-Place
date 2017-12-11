<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with Facebook</title>
 </head>
  <body>
  <?php if ($_SESSION['FBID']): ?>      <!--If logged in already-->
<div class="container">
  <p>Welcome <?php echo $_SESSION['FULLNAME']."!"?></p>
<div class="span4">
 <ul class="nav nav-list">
	<img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
<div><a href="fblogout.php">Logout of ADLUUSolutions</a></div>
</ul></div></div>
    <?php else: ?>                      <!--If not logged in-->
<div class="container">
<div>
    <a href="fbconfig.php"><button>Login with Facebook</a></div>
      </div>
    <?php endif ?>
  </body>
</html>
