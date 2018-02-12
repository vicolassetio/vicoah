


<!-- Begin page content -->
<div class="container-fluid" style="width: 700px">
    <div class="panel-body">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Form Barang</h3>
            </div>

            <div class="panel-body">
                
                <form action ="<?php if ($flag == "edit") {echo base_url("index.php/Barang/do_edit/" . $records->id_barang);}else {echo base_url("index.php/Barang/do_add_new");} ?>" method ="post">

                    <div class="form-group">
                        <label for="Nama">Nama Barang
                        
                        
                        </label>
                        <input type="text" name ="nama_barang" class="form-control" id="namabarang" value ="<?php if($flag=="edit"){echo $records->nama;}else{}?>" placeholder="nama barang"></input>
                        <?php
                            if(form_error('nama_barang') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('nama_barang');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="Kategori">Kategori Barang</label>
                        <br/>
                        <select class="form-control" id = "kategoribarang" name = "kategori_barang" >
                            <option value ="">- Pick one -</option>
                            
                            <?php
                                foreach ($kategori_records as $rec)
                                {
                            ?>
                                    <option <?php if($flag == "edit"){if($rec->id_kategori == $records->id_kategori ){echo 'selected="selected"';}}?> value="<?php echo $rec->id_kategori?>">
                                        <?php echo $rec->nama_kategori; ?>  
                                    </option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php
                            if(form_error('kategori_barang') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('kategori_barang');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="Satuan">Satuan</label>
                        <input type="text" name ="satuan_barang" class="form-control" id="satuanbarang" value ='<?php if($flag=="edit"){echo $records->satuan;}?>' placeholder="satuan"></input>
                        <?php
                            if(form_error('satuan_barang') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('satuan_barang');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>

                    
                    <div class="form-group">
                        <label for="Stok">Stok</label>
                        <input type="text" name ="stok_barang" class="form-control" id="stokbarang" value ='<?php if($flag=="edit"){echo $records->stok;}?>' placeholder="stok" ></input>
                        <?php
                            if(form_error('stok_barang') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('stok_barang');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>


                    <div class="form-group">
                        <label for="HargaJual">Harga jual</label>
                        <input type="text" name ="harga_jual" class="form-control" id="hargajual" value ='<?php if($flag=="edit"){echo $records->harga_jual;}?>' placeholder="harga jual"  ></input>
                        <?php
                            if(form_error('harga_jual') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('harga_jual');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="HargaBeli">Harga beli</label>
                        <input type="text" name ="harga_beli" class="form-control" id="hargabeli" value ='<?php if($flag=="edit"){echo $records->harga_beli;}?>' placeholder="harga beli"></input>
                        
                        <?php
                            if(form_error('harga_beli') != "")
                            {
                                
                        ?>
                                <b style="color: red">
                                        <?php echo form_error('harga_beli');?>
                                </b>
                        <?php
                            }
                        ?>
                        
                    </div>


                    <div class ="form-group">
                        <label for="deskripsi">Deskripsi</label>		
                        <textarea class="form-control" name ="deskripsi" id="deskripsi" rows="5" placeholder="deskripsi" ><?php if($flag=="edit"){echo $records->deskripsi;}?></textarea>
                    </div>


                    

                    <button type="submit" name ="do_add_new" class="btn btn-default" >Save</button>
                    <a href="<?php echo base_url('index.php/Barang');?>">back to view</a>

                </form>
            </div>
        </div>
    </div>
</div>
    