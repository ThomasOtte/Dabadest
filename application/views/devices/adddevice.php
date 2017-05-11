<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>Add Device</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="brand" placeholder="Device Brand" value="<?php echo !empty($device['brand'])?$device['brand']:''; ?>">
          <?php echo form_error('typename','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="devicename" placeholder="Device Name" value="<?php echo !empty($device['devicename'])?$device['devicename']:''; ?>">
          <?php echo form_error('typename','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="Device Location" value="<?php echo !empty($device['location'])?$devicetype['location']:''; ?>">
          <?php echo form_error('typename','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="acqdate" placeholder="Device Acquistion Date" value="<?php echo !empty($devicetype['acqdate'])?$devicetype['acqdate']:''; ?>">
          <?php echo form_error('typename','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn-primary" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>