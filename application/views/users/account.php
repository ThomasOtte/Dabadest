<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>User Account</h2>
    <h3>Welcome <?php echo $user['first_name']; ?>!</h3>
    <div class="account-info">
        <p><b>Name: </b><?php echo $user['first_name'] . " " . $user['last_name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
    </div>
</div>
</body>
</html>