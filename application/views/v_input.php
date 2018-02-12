<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
	</head>
	<body>
		<h1>CRUD CodeIgniter</h1>
		<h3>Tambah data baru</h3>
	<form action="<?php echo base_url().'coba/aksi';?>" method="post">
		<table>
			<tr>
				<td>Id</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><input type="text" name="kategori"></td>
			</tr>
			<tr>
				<td></td>				
				<td><input type="submit" value="Save!"></td>
			</tr>

		</table>
	</form>


	</body>
</html>