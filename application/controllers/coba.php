<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Coba extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('v_model');
		}

		public function index(){
			$data['v_table'] = $this->v_model->test()->result();
			$this->load->view('v_index',$data);
		}

		public function tambah(){
			$this->load->view('v_input');
		}

		public function aksi($isAddAll=TRUE){
			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

				$data = array(
					'id'=>$id,
					'kategori'=>$kategori
					);
				
			$this->v_model->input_data($data,'v_table');
			if($isAddAll==TRUE){
				redirect('coba/index');
			}else{
				return $id;

			}
		}

		public function delete($id){
			$where = array('id'=>$id);
			$this->v_model->hapus_data($where,'v_table');
			redirect('coba/index');
		}

		public function edit($id){
			$where = array('id'=>$id);
			$data['v_table'] = $this->v_model->edit_data($where,'v_table')->result();
				$this->load->view('v_edit',$data);
		}

		public function update($id1,$abc=TRUE){
			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$data = array(
				'id'=>$id,
				'kategori'=>$kategori
				);
			$where = array('id'=>$id1);
			$this->v_model->update_data($where,$data,'v_table');
			
			if ($abc==TRUE) {
			redirect('coba/index');
			}
			else{
				return $id;
			}
		}

		public function details($id){
			if(isset($_POST['submit'])){
				$this->do_update($id);
			}
			else{
			$where = array ('id'=> $id);
			$data['v_table'] = $id;
			$data['v_table_details'] = $this->v_model->detail_data($where,'v_table_details');
			
			$this->load->view('v_details',$data);
			}
		}
		
		public function do_update($id,$updt=TRUE){

			$iddetails = $this->input->post('iddetails');
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');

			if (!is_dir('./assets/images')) {
				mkdir('./assets/images', 0777, true);
			}

			$config['upload_path'] = './assets/images';
			$config['allowed_types']='jpg|png|jpeg';
			$config['max_size']='2048';
			$config['remove_space']=TRUE;
			$this->load->library('upload',$config);

			foreach ($nama as $key => $value) {
				$data = array(
					'nama' => $nama[$key],
					'harga' => $harga[$key]
				);

				$_FILES['userfile']['name'] = $_FILES['gambar']['name'][$key];
                $_FILES['userfile']['type'] = $_FILES['gambar']['type'][$key];
                $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$key];
                $_FILES['userfile']['error'] = $_FILES['gambar']['error'][$key];
                $_FILES['userfile']['size'] = $_FILES['gambar']['size'][$key];

				if ($this->upload->do_upload()) {
					$location_file = $config['upload_path'].'/'.$this->upload->data()['file_name'];
					$data['gambar_details'] =$location_file;

				} else {
					$return = array('result'=>'failed','file'=>'','error'=>$this->upload->display_errors());
				}

				if(isset($isdelete[$key]) && $isdelete[$key]==2){
					$where = array(
						'id' => $id,
						'iddetails'=>$iddetails[$key],
					);
					$this->v_model->hapus_data($where,'v_table_details');
				} else{
					if(isset($iddetails[$key])){
						$where = array(
							'id' => $id,
							'iddetails'=>$iddetails[$key]
						);
						$this->v_model->m_update($where,$data,'v_table_details');
					}
					else{
						$data['id'] = $id;

						$this->v_model->input_data($data,'v_table_details');
					}
				}
			}

			if ($updt==TRUE) {
				redirect('coba/index');
			} else {
				return $iddetails;
			}
		}

		public function tambah_details($id){
			$data['v_table'] = $id;
			$this->load->view('v_tambah_details',$data);
		}


		public function aksi_details($id,$xyz=TRUE){
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');

			$data = array(
				'nama' => $nama,
				'harga' => $harga,
				'id'=>$id
				);

			$this->v_model->tambah_dt($data,'v_table_details');
			
			if($xyz==TRUE){
				redirect('coba/index');
			}else{
				return 0;
			}
		}

		public function tambah_all(){
			$this->load->view('tambah_semua');
		}

		public function tambahsemua(){
			$x = $this->aksi(FALSE);
			$this->aksi_details($x,FALSE);
			redirect('coba/index');
		}

		public function edit_all($id){
			$where = array('id'=>$id);
			$data['id']=$id;
			$data['v_table'] = $this->v_model->getAll($where);

			$this->load->view('editsemua',$data);
		}

		public function update_all($id){
			$y = $this->update($id,FALSE);
			$this->do_update($y,FALSE);
			redirect('coba/index');
		}
	}
	
?>