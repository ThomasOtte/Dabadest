<!DOCTYPE html>
<html lang="en">  
<head>

<title> Add DeviceType</title>
</head>
<body>
<div class="container">
	<h1>Add DeviceType</h1>
    <form action="" method="post">
        <div class="form-group">
        	<label>DeviceType Name: </label>
            <input type="text" class="form-control" name="typename" placeholder="Device Type Name" value="<?php echo !empty($result['typename'])?$result['typename']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>