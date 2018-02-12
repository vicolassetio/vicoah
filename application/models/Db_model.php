<?php
class Db_model extends CI_Model
{
    public function getData($limit,$page)
    {
        
        $offset = $limit * ($page - 1); //ini index datanya dari index ke brp, pagenya  page yg skrg
        $this->load->library('session');
        $kodeID = $this->session->userdata('search_kode');
        $kodeNama = $this->session->userdata('search_nama');
        
        if($kodeID!=''){
            //old code => $this->db->where('kode_pelanggan',$kodeID);
            $this->db->where("kode_pelanggan ilike'%$kodeID%'");
        }
        
        if($kodeNama!=''){
            $this->db->where("nama ilike'%$kodeNama%'");
        }
        
        //$query = $this->db->get('Customer');
        $this->db->order_by("kode_pelanggan", "asc"); 
        $query = $this->db->get('Customer',$limit,$offset);
        return $query->result(); /*result() | row() | array_result() | num_rows() | keyword =>CI active record | return*/
        
    }
    
    public function resultCount()
    {
        return $this->db->count_all("Customer");
    }

    

    function add_new_data($data){
        $this->db->insert('Customer', $data); 
    }

    
    public function check_kode_exist($kode)
    {
        $this->db->where('kode_pelanggan', $kode);
        $query = $this->db->get('Customer');
        
        
        if($query->num_rows()>0)
        {
            return TRUE; //jika data ada maka benar
        }
        return FALSE;
    }
    
    
    
    public function get_last_pelanggan()
    {
        
        $this->db->select('kode_pelanggan');
        $this->db->limit(1);
        $this->db->order_by('kode_pelanggan','desc');
        $query = $this->db->get('Customer');
        if($query->num_rows()>0)
        {
            return $query->row()->kode_pelanggan; //jika data ada maka benar
        }
        return FALSE;
    }
    
    function test()
    {
        $this->db->select('id');
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_test');
        if($query->num_rows()>0)
        {
            return $query->row(); //jika data ada maka benar
        }
        return FALSE;
        
    }
    
    function show_edit($kode)
    {
        $this->db->where('kode_pelanggan',$kode);
        
        $query = $this->db->get('Customer');
        return $query->row();
    }
    
    function do_edit($data,$where)
    {
        $this->db->where('kode_pelanggan',$where);
        $this->db->update('Customer', $data); 
        
    }
    
    
    function delete_pelanggan($id)
    {
        $this->db->delete('Customer',array('kode_pelanggan' => $id));
    }
    
    
    //Barang
    function get_data_barang($limit,$page)
    {   
        $offset = $limit * ($page - 1);   
        $this->load->library('session');
        $kodeNama = $this->session->userdata('search_nama');
        $kodeKategori = $this->session->userdata('search_kategori');
        $kodeSatuan = $this->session->userdata('search_satuan');
        $kodeStok = $this->session->userdata('search_stok');
        
        
        $this->db->select('barang.id_barang, barang.nama, barang.satuan, barang.stok, barang.harga_jual, barang.harga_beli, barang.deskripsi, kategori_barang.nama_kategori');
            
        $this->db->join('kategori_barang','barang.id_kategori = kategori_barang.id_kategori');
        
        
        if($kodeNama!='')
        {
            $this->db->where("barang.nama ilike'%$kodeNama%'");
           // $this->db->or_Ilike("Barang.Nama","$kodeNama");
        }
        
        if($kodeKategori!='')
        {
            $this->db->where("kategori_barang.id_kategori",$kodeKategori);
           // $this->db->or_Ilike("Barang.Nama","$kodeNama");
        }
        
        if($kodeSatuan!='')
        {
            $this->db->where("barang.satuan ilike'%$kodeSatuan%'");
           // $this->db->or_Ilike("Barang.Nama","$kodeNama");
        }
        
        if($kodeStok!='')
        {
            if(is_numeric($kodeStok)){
                $this->db->where("stok",$kodeStok);

            }
           // $this->db->or_Ilike("Barang.Nama","$kodeNama");
        }
        $query = $this->db->get('barang',$limit,$offset);
        
        /*$query = $this->db->query("select a.id_barang, a.nama, a.satuan, a.stok, a.harga_jual, a.harga_beli, a.deskripsi, b.nama_kategori
            From barang a left join kategori_barang b ON a.id_kategori = b.id_kategori 
            where a.nama ilike '%$kodeNama%'");*/
        
        //echo $this->db->last_query();
        //die();
        return $query->result();
    }
    
    //jumlah seluruh record barang
    function recordbarang_count()
    {
        return $this->db->count_all("barang");
    }    
    
    function delete_data_barang($id)
    {
        $this->db->delete('barang',array('id_barang' => $id));
    }
    
    function get_data_kategori()
    {
        
        $query = $this->db->get('kategori_barang');
        return $query->result();
    }
    
    
    function get_last_barang()
    {
        $this->db->select("id_barang");
        $this->db->order_by('id_barang',"desc");
        $this->db->limit(1);
        $query = $this->db->get("barang");
        
        if($query->num_rows() > 0)
        {
            return $query->row()->id_barang;
        }
        else
        {
            return FALSE;
        }
    }
    
    
    function add_data_barang($data)
    {
        $this->db->insert("barang",$data);
    }
    
    function show_data_edit_barang($id)
    {
        $this->db->where('id_barang',$id);
        
        $query = $this->db->get('barang');
        return $query->row();
    }
    
    function edit_data_barang($data,$where)
    {
        $this->db->where('id_barang',$where);
        $this->db->update("barang",$data);
    }
}

