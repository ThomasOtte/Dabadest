<!DOCTYPE html>
<html lang="en">  
<head>

<title>DeviceTypes</title>

</head>
<body>
<div class="page-header">
<h1 class="text-center">DeviceTypes</h1>
</div>
<div class="container">
<p>
	<a href="<?php echo base_url(); ?>DeviceTypes/addDeviceType" class="btn btn-lg btn-primary">Add Device Type</a>
</p>
<table>
<?php foreach($result as $row):?>
<tr>
	<td><a href="<?php echo base_url(); ?>Devices/viewDevice/<?php echo $row->slug; ?>" class="btn btn-lg btn-info"><?php echo $row->typename;?></a> </td>
	<td>
	<a href="<?php echo base_url(); ?>DeviceTypes/editDeviceType/<?php echo $row->id;?>" class="btn btn-sm btn-warning">Edit Device Type</a> 
	<a href="<?php echo base_url(); ?>DeviceTypes/delete/<?php  echo $row->id; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
	</td>   
</tr>

<?php endforeach;?>
</table>
</div>
</body>
</html>