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
        	<label>Description (255 characters max):*</label>
            <textarea class="form-control" rows="6" name="description" placeholder="Malfunction Description" ><?php echo !empty($result['description'])?$result['description']:''; ?></textarea>
        </div>
        <span class="text-danger"><?php echo form_error('description');?></span>
        <div class="form-group">
        	<label>Malfunction Cause (255 characters max):</label>
            <textarea class="form-control" rows="6" name="cause" placeholder="Malfunction Cause" ><?php echo !empty($result['cause'])?$result['cause']:''; ?></textarea>
        </div>
        <div class="form-group">
        	<label>Malfunction Solution (255 characters max):</label>
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
        	<p>*: Required Field </p>
            <input type="submit" name="submit" class="btn btn-md btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>