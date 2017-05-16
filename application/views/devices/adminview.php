<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<h2>Devices</h2>
<div>
	<a href="<?php echo base_url(); ?>Devices/addDevice">Add Device</a>
</div>
<div class="container">
<table class="table">
 <tr>
     <th>Brand</th>
	 <th>Device Name</th>
	 <th>Location</th>
	 <th>Acquisition Date</th>
     <th>&nbsp;</th>
 </tr>

<?php foreach($result as $row):?>
<tr>
	<td><?php echo $row->brand;?> </td> 
	<td><?php echo $row->devicename;?> </td> 
	<td><?php echo $row->location;?> </td> 
	<td><?php echo $row->acqdate;?> </td> 
	<td>
	<a href="<?php echo base_url(); ?>Devices/editDevice/<?php echo $row->id;?>">Edit Device</a> 
	<a href="<?php echo base_url(); ?>Devices/delete/<?php  echo $row->id; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
	<a href="<?php echo base_url(); ?>Malfunctions/addMalfunction/<?php echo $row->id;?>">Report Malfunction</a>  
	
	</td>
</tr>
<?php endforeach;?>

</table>
</div>
</body>
</html>