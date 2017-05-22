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
<?php foreach($result as $row):?>
<p>
	<a href="<?php echo base_url(); ?>Devices/viewDevice/<?php echo $row->slug; ?>" class="btn btn-lg btn-info"><?php echo $row->typename;?></a>      
</p>

<?php endforeach;?>
</div>
</body>
</html>