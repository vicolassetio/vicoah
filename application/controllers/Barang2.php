<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Db_model');
        
        $this->url = 'Lthnbs';
        
    }

    public function test2()
    {
        
    }
    
    public function index()
    {
        /*$this->load->library('pagination');
        //$temp['records'] = $this->Db_model->resultCount();
        
        
        $jumlah_data = $this->Db_model->resultCount();
        
        $limit = 3;
        $jumlah_page = $jumlah_data / $limit;
        $data['records'] = $this->Db_model->getData($limit,$page);
        $data['page'] = $page;
        $data['jumlah_page'] = $jumlah_page;
        
        $config['next_tag_open'] = '<div>';
        $config['next_tag_close'] = '</div>'; 
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';
        $config['base_url'] = base_url() . 'index.php/lthnbs/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = $limit; 
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config); 
        $data['paging']= $this->pagination->create_links();*/
        //$data['searchflag'] = 0;
        
        
        $data['kategori'] = $this->Db_model->get_data_kategori();
        $data['records'] = $this->Db_model->get_data_barang();
        
        $this->load->view('html_head');
        $this->load->view('body_head');
        $this->load->view('content_barang',$data);
        $this->load->view('body_footer');
        $this->load->view('html_footer');
    }
    
    function delete_data_barang($id)
    {
        $this->Db_model->delete_data_barang($id);
        redirect('Barang');
    }
    
    function search_data_barang()
    {
        $nama_barang = $this->input->post('namaSearchBar');
        $kategori_barang = $this->input->post('search_kategori');
        $satuan_barang = $this->input->post('satuanSearchBar');
        $stok_barang = $this->input->post('stokSearchBar');
        
        $this->form_validation->set_rules('stokSearchBar','Stok','callback_stoksearch_check');
        if($this->form_validation->run() != FALSE )
        {
            $this->session->set_userdata('search_nama', $nama_barang);
            $this->session->set_userdata('search_kategori', $kategori_barang);
            $this->session->set_userdata('search_satuan', $satuan_barang);
            $this->session->set_userdata('search_stok', $stok_barang);
            
            redirect("Barang");
        }
        else
        {
            $this->index();
        }
    }
    
    public function stoksearch_check($str)
    {
        
        if(is_numeric($str) == false)
        {
            $this->form_validation->set_message('stoksearch_check','Stok cuma boleh angka');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    function add_new()
    {
        $data['kategori_records'] = $this->Db_model->get_data_kategori();
        $data['flag'] = "add";
        $this->load->view("html_head");
        $this->load->view("content2_barang",$data);
        $this->load->view("html_footer");
    }
    
    
    function do_add_new()
    {
        $data['id_barang'] = $this->get_next_key();
        $data['nama'] = $this->input->post('nama_barang');
        $data['id_kategori'] = $this->input->post('kategori_barang');
        $data['satuan'] = $this->input->post('satuan_barang');
        $data['stok'] = $this->input->post('stok_barang');
        $data['harga_jual'] = $this->input->post('harga_jual');
        $data['harga_beli'] = $this->input->post('harga_beli');
        $data['deskripsi'] = $this->input->post('deskripsi');
        
        
        
    }
    
    function get_next_key()
    {
        $next_key = $this->Db_model->get_last_barang() + 1;
        return $next_key;
    }
    
    function destroy()
    {
        session_destroy();
    }
    
    function edit_data_barang($id)
    {
        $data['kategori_records'] = $this->Db_model->get_data_kategori();
        $data['records'] = $this->Db_model->show_data_edit_barang($id);
        $data['flag'] = "edit";
        
        
        
        $this->load->view('html_head');
        $this->load->view('content2_barang',$data);
        $this->load->view('html_footer');
        
    }
    
    function do_edit($id)
    {
        $data['nama'] = $this->input->post('nama_barang');
        $data['id_kategori'] = $this->input->post('kategori_barang');
        $data['satuan'] = $this->input->post('satuan_barang');
        $data['stok'] = $this->input->post('stok_barang');
        $data['harga_jual'] = $this->input->post('harga_jual');
        $data['harga_beli'] = $this->input->post('harga_beli');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $this->Db_model->edit_data_barang($data,$id);

        redirect('Barang');


        
    }
    
    
    
}
	