<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lthnbs extends CI_Controller {

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
    
    public function index($page=1)
    {
        $this->load->library('pagination');
        //$temp['records'] = $this->Db_model->resultCount();
        
        
        $jumlah_data = $this->Db_model->resultCount();
        
        $limit = 3;
        
        $data['page'] = $page;
        $data['jumlah_page'] = $jumlah_data / $limit;
        $data['records'] = $this->Db_model->getData($limit,$page);
        
        
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
        $data['paging']= $this->pagination->create_links();
        
        $this->load->view('html_head');
        $this->load->view('body_head');
        $this->load->view('content',$data);
        $this->load->view('body_footer');
        $this->load->view('html_footer');
    }
    
    public function view()
    {
        
    }

    public function addNew()
    {
        $data['test'] = $this->get_next_key();
        
        $this->load->view('content2', $data);
    }

    public function do_add_new()
    {   $varx = 1;
        $id_pelanggan = $this->input->post('kodepelanggan');
        
        $this->form_validation->set_rules('kodepelanggan', 'Kode Pelanggan', 'required|callback_kodepelanggan_check|callback_panjangID_check');
        //('nama parts form', 'kata2 yg dipakai di error message', 'validation rule')
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal', 'required|callback_tanggal_check');
                   
        if ($this->form_validation->run() != FALSE)
	{
            
            $data['kode_pelanggan'] = $id_pelanggan;
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nomor_telepon'] = $this->input->post('notelp');
            $data['tanggal_lahir'] = $this->input->post('tgllahir');

            $this->Db_model->add_new_data($data);

            redirect('lthnbs');
	}
        else
        {
            $data['varx'] = 1;
            $data['test'] = $this->get_next_key();
        
            
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nomor_telepon'] = $this->input->post('notelp');
            $data['tanggal_lahir'] = $this->input->post('tgllahir');
            $this->load->view('html_head');
            $this->load->view('content2', $data);
            $this->load->view('html_footer');
        }  
    }
    
    
    public function test()
    {
        $get_last_pelanggan = $this->Db_model->get_last_pelanggan();
        if($get_last_pelanggan != false)
        {    
            $tmp = explode('-',$get_last_pelanggan);
            $cur_id = $tmp[count($tmp)-1];
            $next_id = $cur_id + 1;
            $parameter_lempar['test'] = 'cust-' . date('Ym-') . str_pad($next_id, 3, "0", STR_PAD_LEFT);
            
            
            $this->load->view('html_head');
            $this->load->view('content2',$parameter_lempar);
            $this->load->view('html_footer');
        }
        else
        {
            
        }
        
    }
    
    public function kodepelanggan_check($str)//nilai str adalah input value dr txtbox kodepelanggan
    {
        if($this->Db_model->check_kode_exist($str))//nilai str dkirim ke fungsi check_kode_exist di db_model
        {
            $this->form_validation->set_message('kodepelanggan_check','Kode tersebut sudah ada');
            return FALSE;//kalau kode sama berarti kondisi utk statement di atas false, karena sudah ada, jadi ditolak
        }
        else
        {
            return TRUE;//kode tidak ada
        }
    }
    
    public function panjangID_check($str)
    {
        if(strlen($str)==15)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('panjangID_check','Kode pelanggan harus 15 karakter');
            return FALSE;
        }
    }
    
   
    public function tanggal_check($str)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$str))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('tanggal_check','tanggal harus benar formatnya');
            return false;
        }
    }
    
    
    //Mendapatkan kode pelanggan berikutnya
    function get_next_key()
    {
        $get_last_pelanggan = $this->Db_model->get_last_pelanggan();
        if($get_last_pelanggan != false)
        {    
            $tmp = explode('-',$get_last_pelanggan);
            $cur_id = $tmp[count($tmp)-1];
            $next_id = $cur_id + 1;
            return 'cust-' . date('Ym-') . str_pad($next_id, 3, "0", STR_PAD_LEFT);
            
        }
    }
    
    public function search()
    {
        $keywordID = $this->input->post('searchBar');
        $keywordName = $this->input->post('namaSearchBar');
        
        $this->session->set_userdata('search_kode', $keywordID);
        $this->session->set_userdata('search_nama', $keywordName);
        redirect('lthnbs');
    }
    
    
    
    public function deleteRow($kode)
    {
        $this->Db_model->delete_pelanggan($kode);
             
        redirect('lthnbs');    
    }
    
    public function editRow($kode)
    {
        
        $data['records'] = $this->Db_model->show_edit($kode);
        $data['varx'] = 2;
        
        
        $this->load->view('html_head');
        $this->load->view('content2',$data);
        $this->load->view('html_footer');
    }
    
    public function do_editRow($kodepelanggan)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required'); 
        $this->form_validation->set_rules('tgllahir', 'Tanggal', 'required|callback_tanggal_check');
        
        if ($this->form_validation->run() != FALSE)
        {
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nomor_telepon'] = $this->input->post('notelp');
            $data['tanggal_lahir'] = $this->input->post('tgllahir');
            $this->Db_model->do_edit($data,$kodepelanggan);

            redirect('lthnbs');
        }
        else
        {
            $this->editRow($kodepelanggan);
        }
    }
}
	