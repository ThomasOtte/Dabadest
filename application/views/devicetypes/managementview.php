<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<div class="container">
<?php foreach($result as $row):?>
<p>
	<a href="<?php echo base_url(); ?>devices/viewdevice/<?php echo $row->id; ?>"><?php echo $row->typename;?></a>      
</p>

<?php endforeach;?>
</div>
</body>
</html>