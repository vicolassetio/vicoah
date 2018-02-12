    <!-- Begin page content -->
<div class="container-fluid" style="width: 700px">
    <div class="panel-body">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Form Pelanggan</h3>
            </div>

            <div class="panel-body">
                
                <form action ="<?php if($varx == 1){echo base_url('index.php/Lthnbs/do_add_new');}else if($varx==2){echo base_url('index.php/Lthnbs/do_editRow/' . $records->kode_pelanggan);}?>" method ="post">

                    <div class="form-group">
                        <label for="kodepelanggan">Kode Pelanggan
                        <?php 
                        if(form_error('kodepelanggan')!='')
                        {
                        ?>
                        
                            <b style="color: red;">
                                <?php echo form_error('kodepelanggan');?>
                            </b>
                        <?php
                        }
                        ?>
                        
                        </label>
                        <input type="text" name ="kodepelanggan" class="form-control" id="kodecustomer" value ="<?php if($varx == 1){echo $test;}else if($varx == 2){echo $records->kode_pelanggan;}else if($varx == 3){echo $id;}?>" placeholder="kode pelanggan" style ="width:500px">
                        
                    </div>	

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name ="nama" class="form-control" id="nama" value ='<?php if($varx==1){echo $nama;}else if($varx == 2){echo $records->nama;}else if($varx == 3){echo $nama;}?>' placeholder="nama"  style ="width:500px" >
                        <?php 
                        if(form_error('nama')!='')
                        {
                        ?>
                        
                            <b style="color: red;">
                                <?php echo form_error('nama');?>
                            </b>
                        <?php
                        }
                        ?>
                    </div>


                    <div class ="form-group">
                        <label for="alamat">Alamat</label>		
                        <textarea class="form-control" name ="alamat" id="alamat" rows="5" style ="width: 500px" placeholder="alamat" ><?php if($varx==1){echo $alamat;}else if($varx == 2){echo $records->alamat;}else if($varx == 3){echo $alamat;}?></textarea>
                    </div>


                    <div class ="form-group">
                        <label for ="notelp">Nomor Telepon</label>
                        <input type ="text" name ="notelp" class="form-control" id="notelp" value='<?php if($varx==1){echo $nomor_telepon;}else if($varx == 2){echo $records->nomor_telepon;}else if($varx == 3){echo $nomor_telepon;}?>' placeholder="nomor telepon" style="width: 500px">
                    </div>

                    <div class ="form-group">
                        <label for ="tgllahir">Tanggal Lahir (YYYY-MM-DD)</label>
                        <input type ="date" name ="tgllahir" class="form-control" id="tgllahir" value='<?php if($varx==1){echo $tanggal_lahir;}else if($varx == 2){echo $records->tanggal_lahir;}else if($varx == 3){echo $tanggal_lahir;}?>' style="width: 500px"> </input>                       <?php 
                            if(form_error('tgllahir')!='')
                            {
                        ?>
                        
                            <b style="color: red;">
                                <?php echo form_error('tgllahir');?>
                            </b>
                        <?php
                            }
                        ?>
                        
                    </div>

                    <button type="submit" name ="do_add_new" class="btn btn-default" >save</button>
                    <a href="<?php echo base_url('index.php/Lthnbs');?>">back to view</a>

                </form>
            </div>
        </div>
    </div>
</div>
    