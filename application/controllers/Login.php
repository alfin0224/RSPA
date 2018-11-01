<?php
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('login_adm');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => sha1($password)
			);
		$cek = $this->m_login->cek_login("user_admin", $where)->num_rows();
		if($cek > 0){
			/*
			$ambil_data = $this->m_login->ambil("user_admin", $where)->result();
			foreach ($ambil_data as $a) {
				$role = $a->role;
			}

			$data_session = array(
				'username' => $username,
				'status' => "login",
				'role' => $role
				);
			*/
			$ambil_data 	= $this->m_login->ambil("user_admin", $where)->row();

			$data_session  			= (array) $ambil_data; //convert jadi array
			if (isset($data_session['__ci_last_regenerate'])) {
				unset($data_session['__ci_last_regenerate']);
			}
			$data_session['status'] = "login";
			$this->session->set_userdata($data_session);
			
			redirect(base_url("user_adm/"));

		}else{
			echo "<script> alert('data yang anda masukkan salah!!');
			history.back();
		</script>";
	}
}

function logout(){
	$this->session->sess_destroy();
	redirect(base_url('login'));
}
}

