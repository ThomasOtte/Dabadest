<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<h2>Devicetypes</h2>
<div>
	<a href="<?php echo base_url(); ?>devicetypes/adddevicetype">Add Device Type</a>
</div>
<div class="container">
<?php foreach($result as $row):?>
<p>
	<a href="<?php echo base_url(); ?>devices/viewdevice/<?php echo $row->slug; ?>"><?php echo $row->typename;?></a>  
	<a href="<?php echo base_url(); ?>devicetypes/editdevicetype/<?php echo $row->id;?>">Edit Device Type</a> 
	 <a href="<?php echo base_url(); ?>devicetypes/delete/<?php  echo $row->id; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>   
</p>

<?php endforeach;?>
</div>
</body>
</html>