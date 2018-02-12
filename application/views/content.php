<!-- Begin page content -->


</script>
<div class="container">
    <div class="page-header">
        <h1>Customer</h1>
    </div>

    <table id="tabledata" class="tablesorter">
        <tr>
            <td>ID<td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Name</td>
            <td></td>
            <td>&nbsp;&nbsp</td>
        </tr>

        <tr>
            <form action ="<?php echo base_url('index.php/Lthnbs/search');?>" method ="post">
                <td><input type= "textbox" value="<?php echo $this->session->userdata('search_kode');?>" class="form-control" name="searchBar" id="IDsearchid"></input></td>
                <td><!--<input type="submit" value="Submit" class="btn"></input>--></td>
                <td></td>
                <td><input type= "textbox" value="<?php echo $this->session->userdata('search_nama');?>" class="form-control" name="namaSearchBar" id="Namesearchid"></input></td>
                <td><input type="submit" value="Submit" class="btn"></input></td>
                <td></td>
                <form action ="<?php echo base_url('index.php/Lthnbs/search');?>">
                    <td><input type="submit" value="Reset" class="btn" onclick="clear_text()"></input></td>
                </form>
            </form>
        
        <script>
        function clear_text()
        {
            document.getElementById('IDsearchid').value = "";
            document.getElementById('Namesearchid').value = "";
            
        }
        </script>
        
        
        </tr>
        
        
    </table>
    
    

    <br/>
    <br/>

    <table class ="customer_table table">
        <tr>

            <th>Kode Pelanggan</th>
            <td><b>Nama</td>
            <td><b>Alamat</td>
            <td><b>Nomor Telepon</td>
            <td><b>Tanggal Lahir</td>
            <td><b>Action</td>
            <td></td>

        </tr>
        <?php

        

        foreach($records as $rec)
        {
        ?>
        
        
        <tr>
            <td><?php echo $rec->kode_pelanggan;?></td>
            <td><?php echo $rec->nama;?></td>
            <td><?php echo $rec->alamat;?></td>
            <td><?php echo $rec->nomor_telepon;?></td>
            <td><?php echo $rec->tanggal_lahir;?></td>
            <td>
                <form action ="<?php echo base_url('index.php/Lthnbs/editRow/' . $rec->kode_pelanggan);?>">
                    <input type="submit" value="Edit" class="btn"></input>
                </form>
            </td>
                
            <td>
                <form action ="<?php echo base_url('index.php/Lthnbs/deleteRow/' . $rec->kode_pelanggan);?>" onsubmit="return delete_function()">
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

    <?php echo $paging; ?>

    <form action ="<?php echo base_url('index.php/Lthnbs/do_add_new');?>">
        <input type="submit" value="Add New" class="btn"></input>
    </form>


</div>

    