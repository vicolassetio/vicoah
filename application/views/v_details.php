<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD CI</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
		<!-- <script>
			$(document).ready(function(){
				$("#tambah").click(function(){
					var iddetails= $("#iddetails").val();
					var nama= $("#nama").val();
					var harga=$("#harga").val();
					var gambar= $("#gambar").val();
					var baris_baru= "<tr><td>"+iddetails+"</td><td>"+ nama+"</td><td>"+harga+"</td><td>"+gambar+"</td></tr>"

					$("#tabel_details").append(baris_baru);

				});
			});
		</script> -->
	</head>
	<body>
	<div class="container">
			<center>
				<h1>CRUD CI</h1>
				<h3>Details Data</h3>
				<h4><?php echo anchor('coba/tambah_details/'.$v_table,'Tambah Details');?></h4>
			</center>
		<button type="button" id="add_row">
			Tambah details
		</button>
		<h4></h4>
		<form action="" method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover" id="tabel_details">
			<thead>
			<tr>
				<th>Id Details</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Images</th>	
				<th>Action</th>		
			</tr>
			</thead>
			<tbody>
			<?php foreach ($v_table_details as $k=> $v) {?>
				<tr row="<?php echo $k ?>">
					<td>
						<?php echo $k+1; ?>
							
					</td>

					<td>
						<input type="hidden" name="iddetails[]" id="iddetails" value="<?php echo $v->iddetails;?>">
						<input type="hidden" name="isdelete[]" id="isdelete" value="1">
						<input type="text" name="nama[]" id="nama" value="<?php echo $v->nama; ?>">	
					</td>

					<td>
						<input type="text" name="harga[]" id="harga" value="<?php echo $v->harga; ?>">
					</td>

					<td>
					<?php

						if(!empty($v->gambar_details)){
					?>
						<img class="img-thumbnail" src='<?php echo base_url().$v->gambar_details;?>' width='100' height='100'/>
					<?php 
						} 
					?>
					
					<input type="file" name="gambar[]" id="gambar">
					</td>
					<td>
						<button type="button" id="delete_row" onclick="remove_row(<?php echo $k ?> )">
							Hapus Details
						</button>
					</td>
				</tr>

			<?php 
				}
			?>
			</tbody>
		</table>
		<h4></h4>
		<input type="submit" name="submit" value="Save">
		</form>
	</div>
	</body>
	<script type="text/javascript">
		$('#add_row').on('click', function(e) {
			var last_key = $('table > tbody > tr').last().attr('row');
			var curr_key = parseInt(last_key) + 1;
			var html_row = '<tr row="'+curr_key +'">\n\
								<td>'+ parseInt(curr_key + 1)  +'</td>\n\
								<td>\n\
									<input type="text" name="nama[]" id="nama">\n\
								</td>\n\
								<td>\n\
									<input type="text" name="harga[]" id="harga">\n\
								</td>\n\
								<td>\n\
									<input type="file" name="gambar[]" id="gambar">\n\
								</td>\n\
							</tr>';
			$('tr[row="'+last_key+'"]').after(html_row);
		});
		function remove_row(id_row) {
			$('tr[row="'+id_row+'"]').css({display:'none'});

			$('tr[row="'+id_row+'"] > td > input[name="isdelete[]"]').val('2');
		}
	</script>
</html>