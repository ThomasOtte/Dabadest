<!DOCTYPE html>
<html lang="en">  
<head>

<title>Malfunctions</title>

</head>
<body>
<div class="page-header">
<h1 class="text-center">Malfunctions</h1>
</div>
<div class="container">
<table class="table">
 <tr>
     <th>Device Brand</th>
	 <th>Device Name</th>
	 <th>Malfunction Location</th>
	 <th>Malfunction Date</th>
	 <th>Malfunction Time</th>
	 <th>Fixed?</th>
	 <th>Priority</th>
     <th>&nbsp;</th>
 </tr>
<?php foreach($result as $row):?>
<tr <?php if ($row->fixed == "yes"){?> class="bg-success" <?php }?>>
	<td><?php echo $row->devicebrand;?> </td> 
	<td><?php echo $row->devicename;?> </td> 
	<td><?php echo $row->devicelocation;?> </td> 
	<td><?php echo $row->date;?> </td> 
	<td><?php echo $row->time;?> </td> 
	<td><?php echo $row->fixed;?> </td> 
	<td><?php echo $row->priority;?> </td> 
	<td>
	<a href="<?php echo base_url(); ?>Malfunctions/editMalfunction/<?php echo $row->id;?>" class="btn btn-sm btn-warning"> Edit Malfunction </a>
	<a href="<?php echo base_url(); ?>Malfunctions/delete/<?php  echo $row->id; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
	<a href="<?php echo base_url(); ?>Reports/viewReport/<?php echo $row->id; ?>" class="btn btn-sm btn-info">View Report</a>   
	
	</td>
</tr>
<?php endforeach;?>

</table>
</div>
</body>
</html>