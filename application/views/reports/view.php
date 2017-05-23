<!DOCTYPE html>
<html lang="en">  
<head>

<title>Malfunction Report</title>

</head>
<body>

<div class="container">
<h1>Malfunction Report</h1>
<a class="btn btn-md btn-info" href="<?php echo base_url(); ?>Reports/editReport/<?php echo $result ['0']->id;?>">Edit Report</a>
<a class="btn btn-md btn-warning" href="<?php echo base_url(); ?>Reports/delete/<?php  echo $result ['0']->id; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
<br>
<label> Malfunction Description: </label>
<p> <?php echo $result ['0']->description ?>
</div>
<div class="container">
<label> Malfunction Cause: </label>
<p> <?php echo $result ['0']->cause ?>
</div>
<div class="container">
<label> Malfunction Solution: </label>
<p> <?php echo $result ['0']->solution ?>
</div>
<div class="container">
<label> Date Fixed: </label>
<p> <?php echo $result ['0']->date ?>
</div>
<div class="container">
<label> Time Fixed: </label>
<p> <?php echo $result ['0']->time ?>
</div>
</body>
</html>