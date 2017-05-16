<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
    <h2>Add/Edit Report</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" size="25" class="form-control" name="description" placeholder="Malfunction Description" value="<?php echo $result['description']; ?>">
        </div>
        <div class="form-group">
            <input type="text" size="25" class="form-control" name="cause" placeholder="Malfunction Cause" value="<?php echo $result['cause']; ?>">
        </div>
        <div class="form-group">
            <input type="text" size="25" class="form-control" name="solution" placeholder="Malfunction Solution" value="<?php echo $result['solution']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="Date Fixed" value="<?php echo $result['date']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="time" placeholder="Time Fixed" value="<?php echo $result['time']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn-primary" value="Submit"/>
        </div>
    </form>              
</div>
</body>
</html>