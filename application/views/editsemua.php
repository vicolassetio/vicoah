<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
	</head>
	<body>
		<h1>CRUD CI</h1>
		<h3>Edit Data</h3>

		<form action="<?php echo base_url().'coba/update_all/'.$id ;?>" method="post">
		<table>
			<p>Table Tambah Data Baru</p>
			<tr>
				<td>Id</td>
				<td><input type="text" name="id" value="<?php echo $id; ?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><input type="text" name="kategori" value="<?php echo $v_table['master'][0]->kategori; ?>"></td>
			</tr>
		</table>
		<br><br><br><br>
		<table>
			<p>Table Tambah Details</p>
			<?php foreach ($v_table['details'] as $k => $v) {?>

			<tr>
				<td>Nama</td>
				<input type="hidden" name="iddetails[]" value="<?php echo $v->idDetails;?>">
				<td><input type="text" name="nama[]" value="<?php echo $v->Nama; ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="harga[]" value="<?php echo $v->harga; ?>"></td>
			</tr>
			<?php }?>
			<tr>
				<td><input type="submit" value="Save"></td>
			</tr>
		</table>
		</form>
	</body>
</html>