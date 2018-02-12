<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
	</head>
	<body>
		<h1>CRUD CodeIgniter</h1>
		<h3>Tambah Data Baru & Details</h3>
		<form action="<?php echo base_url().'coba/tambahsemua';?>" method="post">
		<table>
			<p>Table Tambah Data Baru</p>
			<tr>
				<td>Id</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><input type="text" name="kategori"></td>
			</tr>
		</table>
		<br><br><br><br>
		<table>
			<p>Table Tambah Details</p>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Save"></td>
			</tr>
		</table>
		</form>
	</body>
</html>