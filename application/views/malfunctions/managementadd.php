<!DOCTYPE html>
<html lang="en">  
<head>

<title>Add Malfunction</title>

</head>
<body>
<div class="container">
    <h2>Add/Edit Malfunction</h2>
    <form action="" method="post">
        <div class="form-group">
        	<label>Malfunction Date:</label>
            <input type="text" class="form-control" name="date" placeholder="Malfunction Date" value="<?php echo !empty($result['date'])?$result['date']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Malfunction Time:</label>
            <input type="text" class="form-control" name="time" placeholder="Malfunction Time" value="<?php echo !empty($result['time'])?$result['time']:''; ?>">
        </div>
        <div class="form-group">
        	<label>
        	<input type="hidden" value="no" name="fixed">
            <input type="checkbox" name="fixed" value="yes" placeholder="Fixed?" value="<?php echo !empty($result['fixed'])?$result['fixed']:'';?>">
            Fixed
            </label>
        </div>
        <div class="form-group">
        	<input type="hidden" value="0" name="priority">
            <input type="submit" name="submit" class="btn btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>