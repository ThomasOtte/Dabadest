<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>Add Device Type</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="typename" placeholder="Device Type Name" value="<?php echo !empty($result['typename'])?$result['typename']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn-primary" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>