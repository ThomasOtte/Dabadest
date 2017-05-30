<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>User Login</h2>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form action="" method="post">
        <div class="form-group has-feedback">
        	<label>E-Mail:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        <div class="form-group">
            <input type="submit" name="loginSubmit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>
    <p class="footInfo">Don't have an account? <a href="<?php echo base_url(); ?>users/registration">Register here</a></p>
    
    <div>
    Testadmin: f@e.com	password: Apple1 <br>
    Testuser: a@b.com	password: Apple1
    </div>
</div>
</body>
</html>