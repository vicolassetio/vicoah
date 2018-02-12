<?php
$get_kategori = $this->session->userdata('search_kategori');
?>

<!-- Begin page content -->

</script>
<div class="container">
    <div class="page-header">
        <h1>Barang</h1>
    </div>

    <table id="tabledata" class="tablesorter" border="0">
        <tr>
            
            
            <td>Name</td>
            <td></td>
            <td>Kategori</td>
            <td>&nbsp;&nbsp</td>
            <td>Satuan</td>
            <td></td>
            <td>Stok</td>
        </tr>

        <tr>
            <form action ="<?php echo base_url ("index.php/Barang/search_data_barang");?>" method ="post">
                
                
                <td><input type= "textbox" value="<?php echo $this->session->userdata('search_nama'); ?>" class="form-control" name="namaSearchBar" id="Namesearchid"></input></td>
                <td>&nbsp;&nbsp</td>
                <td>
                    <select class = "form-control" id ="Kategorisearchid" name="search_kategori" >
                        <option value="">- Pick one -</option>
                        <?php
                        echo $kategori_barang;
                        foreach($kategori as $kat)
                        {
                        ?>
                            <option <?php if($get_kategori==$kat->id_kategori){echo 'selected="selected"';}?> value='<?php echo $kat->id_kategori; ?>'><?php echo $kat->nama_kategori;?></option>
                        <?php
                        }
                        ?>
                    </select> 
                </td>
                <td>&nbsp;&nbsp</td>
                <td><input type= "textbox" value="<?php echo $this->session->userdata('search_satuan'); ?>" class="form-control" name="satuanSearchBar" id="Satuansearchid"></input></td>
                <td>&nbsp;&nbsp</td>
                <td><input type= "textbox" value="<?php echo $this->session->userdata('search_stok'); ?>" class="form-control" name="stokSearchBar" id="Stoksearchid"></input></td>
                    
                <td>&nbsp;&nbsp</td>
                <td><input type="submit" value="Submit" class="btn"></input></td>
                <td>&nbsp;&nbsp</td>
                
                <form action ="<?php echo base_url("index.php/Barang"); ?>">
                    <td><input type="submit" value="Reset" class="btn" onclick="clear_text()"></input></td>
                </form>
                
            </form>
        
        <script>
        function clear_text()
        {
            document.getElementById('Namesearchid').value = "";
            document.getElementById('Kategorisearchid').value = "";
            document.getElementById('Satuansearchid').value = "";
            document.getElementById('Stoksearchid').value = ""; 
           //<//?php session_destroy();?>
        }
        </script>
        
        
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <?php 
                    if(form_error('stokSearchBar')!='')
                    {
                        
                ?>
                        
                    <b style="color: red;">
                        <?php echo form_error('stokSearchBar');?>
                    </b>
                <?php
                    }
                    
                    //if($this->session->userdata('nodata') != false){
                        //echo "harus integer";
                    //}
                ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
        
        
        
    </table>
    

    <br/>
    <br/>

    <table class ="customer_table table" >
        <tr>

            
            <td><b>Nama</td>
            <td><b>Kategori Barang</td>
            <td><b>Satuan</td>
            <td><b>Stok</td>
            <td><b>Harga Jual</td>
            <td><b>Harga Beli</td>
            <td><b>Deskripsi</td>
            <td><b>Action</td>
            <td></td>

        </tr>
        
        <?php
        foreach($records as $rec)
        {
        ?>
        
        
        <tr>
            <td><?php echo $rec->nama; ?></td>
            <td><?php echo $rec->nama_kategori; ?></td>
            <td><?php echo $rec->satuan;?></td>
            <td><?php echo $rec->stok;?></td>
            <td><?php echo $rec->harga_jual;?></td>
            <td><?php echo $rec->harga_beli;?></td>
            <td><?php echo $rec->deskripsi;?></td>
            <td>
                <form action ="<?php echo base_url('index.php/Barang/edit_data_barang/'. $rec->id_barang); ?>">
                    <input type="submit" value="Edit" class="btn"></input>
                </form>
            </td>
                
            <td>
                <form action ="<?php echo base_url('index.php/Barang/delete_data_barang/' . $rec->id_barang);?>" onsubmit="return delete_function()">
                    <input type="submit" value="Delete" class="btn"></input>
                </form>
                
                <script>
                    function delete_function()
                    {
                        var ask = confirm("Want to delete?");
                        if(ask == true)
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                </script>
            </td>
        </tr>
        
        <?php

        }

        ?>
        
    </table>

    <?php
        echo $paging;
    ?>

    <form action ="<?php echo base_url('index.php/Barang/add_new');?>">
        <input type="submit" value="Add New" class="btn"></input>
    </form>


</div>

    