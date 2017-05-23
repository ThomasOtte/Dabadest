<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>User Registration</h2>
    <form action="" method="post">
        <div class="form-group">
        	<label>E-Mail:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" >
        </div>
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Surname:</label>
            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo !empty($user['last_name'])?$user['last_name']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>
    <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p>              
</div>
</body>
</html>