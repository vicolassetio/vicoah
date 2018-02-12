<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
	</head>
	<body>
	<div class="container">
	<div class="jumbotron">
		<center>
			<h1>CRUD CodeIgniter</h1>
			<h3><button class="btn btn-lg btn-default"><?php echo anchor('coba/tambah','Tambah Data');?></button></h3>
			<h3><button class="btn btn-lg btn-info"><?php echo anchor('coba/tambah_all','Tambah Data & Details');?></button></h3>
		</center>
	</div>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th>Id</th>
				<th>Kategori</th>
				<th>Action</th>
			</tr>
			<?php
				foreach ($v_table as $vt) {?>
					<tr>
						<td><?php echo $vt->id; ?></td>
						<td><?php echo $vt->kategori; ?></td>
						<td>
							<?php echo anchor(base_url().'coba/edit/'.$vt->id,'Edit'); ?>
							<?php echo anchor(base_url().'coba/delete/'.$vt->id,'Hapus'); ?>
							<?php echo anchor(base_url().'coba/details/'.$vt->id,'Details') ?>
							<?php echo anchor(base_url().'coba/edit_all/'.$vt->id,'Edit All')?>
						</td>
					</tr>

			<?php }?>

		</table>
	</div>
	</body>
</html>