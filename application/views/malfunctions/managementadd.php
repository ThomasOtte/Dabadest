<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>Add Device</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="Malfunction Date" value="<?php echo !empty($malfunction['date'])?$malfunction['date']:''; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="time" placeholder="Malfunction Time" value="<?php echo !empty($malfunction['time'])?$malfunction['time']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn-primary" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>