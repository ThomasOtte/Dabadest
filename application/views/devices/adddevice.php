<!DOCTYPE html>
<html lang="en">  
<head>
<title>Add/Edit Device</title>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <h1>Add/Edit Device</h1>
        <div class="form-group">
        	<label>Brand:*</label>
            <input type="text" class="form-control" name="brand" placeholder="Device Brand" value="<?php echo !empty($result['brand'])?$result['brand']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Devicename:*</label>
            <input type="text" class="form-control" name="devicename" placeholder="Devicename" value="<?php echo !empty($result['devicename'])?$result['devicename']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Location:*</label>
            <input type="text" class="form-control" name="location" placeholder="Device Location" value="<?php echo !empty($result['location'])?$result['location']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Acquisition Date:*</label>
            <input type="text" class="form-control" name="acqdate" placeholder="Device Acquistion Date" value="<?php echo !empty($result['acqdate'])?$result['acqdate']:''; ?>">
        </div>
        <div class="form-group">
        	<p>*: Required Field </p>
            <input type="submit" name="submit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>