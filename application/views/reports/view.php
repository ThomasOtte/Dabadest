<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<h2>Malfunction Report</h2>
<div>
<a href="<?php echo base_url(); ?>Reports/editReport/<?php echo $result ['0']->id;?>">Edit Report</a>
<a href="<?php echo base_url(); ?>Reports/delete/<?php  echo $result ['0']->id; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> 
</div>
<div class="container">
<p> Malfunction Description: </p>
<p> <?php echo $result ['0']->description ?>
</div>
<div class="container">
<p> Malfunction Cause: </p>
<p> <?php echo $result ['0']->cause ?>
</div>
<div class="container">
<p> Malfunction Solution: </p>
<p> <?php echo $result ['0']->solution ?>
</div>
<div class="container">
<p> Date Fixed: </p>
<p> <?php echo $result ['0']->date ?>
</div>
<div class="container">
<p> Time Fixed: </p>
<p> <?php echo $result ['0']->time ?>
</div>
</body>
</html>