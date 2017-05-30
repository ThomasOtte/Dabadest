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
        	<label>Malfunction Date:*</label>
            <input type="text" class="form-control" name="date" placeholder="Malfunction Date" value="<?php echo !empty($result['date'])?$result['date']:''; ?>">
        </div>
        <span class="text-danger"><?php echo form_error('date');?></span>
        <div class="form-group">
        	<label>Malfunction Time:*</label>
            <input type="text" class="form-control" name="time" placeholder="Malfunction Time" value="<?php echo !empty($result['time'])?$result['time']:''; ?>">
        </div>
        <span class="text-danger"><?php echo form_error('time');?></span>
        <div class="form-group">
        	<label>
        	<input type="hidden" value="NO" name="fixed">
            <input type="checkbox" name="fixed" value="YES" placeholder="Fixed?" value="<?php if(!empty($result)){if ($result['fixed'] == "YES"){echo "checked=checked";}}?>">
            Fixed
            </label>
        </div>
        <div class="form-group">
       	    <p>*: Required Field </p>
        	<input type="hidden" value="0" name="priority">
            <input type="submit" name="submit" class="btn btn-info" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>