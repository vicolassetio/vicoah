<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
	</head>
	<body>
		<h1>CRUD CI</h1>
		<h3>Edit Data</h3>

		<?php foreach ($v_table as $vt) {?>
		<form action="<?php echo base_url().'coba/update/'.$vt->id;?>" method="post">
			<table>
				<tr>
					<td>Id</td>
					<td>
						<input type="text" name="id" value="<?php echo $vt->id;?>">
					</td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td><input type="text" name="kategori" value="<?php echo $vt->kategori;?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Save"></td>
			</tr>
			</table>
		</form>
		<?php }?>
	</body>
</html>