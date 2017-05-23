<!DOCTYPE html>
<html lang="en">  
<head>

<title> Add/Edit Report </title>

</head>
<body>
<div class="container">
    <form action="" method="post">
    	<h1>Add/Edit Report</h1>
        <div class="form-group">
        	<label>Descripition:</label>
            <input type="text" size="25" class="form-control" name="description" placeholder="Malfunction Description" value="<?php echo !empty($result['description'])?$result['description']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Malfunction Cause:</label>
            <textarea class="form-control" rows="6" name="cause" placeholder="Malfunction Cause" ><?php echo !empty($result['cause'])?$result['cause']:''; ?></textarea>
        </div>
        <div class="form-group">
        	<label>Malfunction Solution:</label>
            <textarea class="form-control" rows="6" name="solution" placeholder="Malfunction Solution" ><?php echo !empty($result['solution'])?$result['solution']:''; ?></textarea>
        </div>
        <div class="form-group">
        	<label>Date Fixed:</label>
            <input type="text" class="form-control" name="date" placeholder="Date Fixed" value="<?php echo !empty($result['date'])?$result['date']:''; ?>">
        </div>
        <div class="form-group">
        	<label>Time Fixed:</label>
            <input type="text" class="form-control" name="time" placeholder="Time Fixed" value="<?php echo !empty($result['time'])?$result['time']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>