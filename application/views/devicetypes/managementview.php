<!DOCTYPE html>
<html lang="en">  
<head>
</head>
<body>
<h2>Devicetypes</h2>
<div class="container">
<?php foreach($result as $row):?>
<p>
	<a href="<?php echo base_url(); ?>Devices/viewDevice/<?php echo $row->slug; ?>"><?php echo $row->typename;?></a>      
</p>

<?php endforeach;?>
</div>
</body>
</html>