<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<h2>Malfunctions</h2>
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
<tr>
	<td><?php echo $row->devicebrand;?> </td> 
	<td><?php echo $row->devicename;?> </td> 
	<td><?php echo $row->devicelocation;?> </td> 
	<td><?php echo $row->date;?> </td> 
	<td><?php echo $row->time;?> </td> 
	<td><?php echo $row->fixed;?> </td> 
	<td><?php echo $row->priority;?> </td> 
	<td>
	</td>
</tr>
<?php endforeach;?>

</table>
</div>
</body>
</html>