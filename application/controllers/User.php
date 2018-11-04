<?php
class User extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Query');
		$this->load->model('M_daerah','daerah');
		$this->load->helper('url');
	}
	public function index()
	{
		$where = array();
		// $data['provinsi'] = $this->Query->get_data('provinsi', $where)->result();
		// $data['kabupaten'] = $this->Query->get_data('kabupaten', $where)->result();
		// $data['kecamatan'] = $this->Query->get_data('kecamatan', $where)->result();
		$data['kontak']=$this->Query->get_order_by('*','kontak_rspa', $where, 'tgl_diubah', 'DESC', '1');
		$data['provinsi']=$this->daerah->getProv();
		$this->load->view('beranda', $data);
	}
	public function getKab($id_prov)
	{
		$kab=$this->daerah->getKab($id_prov);
		echo"<option value=''>Pilih Kota/Kab</option>";
		foreach($kab as $k){
			echo "<option value='{$k->id_kab}'>{$k->nama_kab}</option>";
		}
	}
	
	public function getKec($id_kab)
	{
		$kec=$this->daerah->getKec($id_kab);
		echo"<option value=''>Pilih Kecamatan</option>";
		foreach($kec as $k){
			echo "<option value='{$k->id_kec}'>{$k->nama_kec}</option>";
		}
	}

	public function getKel($id_kec)
	{
		$kel=$this->daerah->getKel($id_kec);
		echo"<option value=''>Pilih Kelurahan/Desa</option>";
		foreach($kel as $k){
			echo "<option value='{$k->id_kel}'>{$k->nama_kel}</option>";
		}
	}	

	public function simpan_pendaftaran(){
		$this->load->library('upload');
		$tgl_lahir = $this->input->post('tgl_lahir_pasien');
		$no_kartu1 = $this->input->post('no_kartu');
		#hitung umur
		$tanggal = new DateTime(trim($tgl_lahir));
		// $tanggal = new DateTime('06-12-2011');
		$today = new DateTime('today');
		$y = $today->diff($tanggal)->y;
		$m = $today->diff($tanggal)->m;
		$tgl_daftar = date('d-m-Y');
		$where = array();
		$data['biodata_pasien'] = $this->Query->get_data('biodata_pasien', $where);
		// foreach ($biodata_pasien as $b) {
		// 	$no_kartu = $b->no_kartu;
		// 	if ($no_kartu != $no_kartu1 ) {
		$isi_data_pasien = array(
			'nama' 	            =>	$this->input->post('nama_pasien'),
			'tgl_lahir'         =>  $tgl_lahir,
			'umur'              =>  $y,
			'jenis_kelamin' 	=>	$this->input->post('jenis_kelamin'),
			'jenis_penyakit' 	=>	$this->input->post('jenis_penyakit'),
			'tgl_dibutuhkan' 	=>	$this->input->post('tgl_dibutuhkan'),
			'nama_ayah' 	    =>	$this->input->post('nama_ayah'),
			'pekerjaan_ortu' 	=>	$this->input->post('pekerjaan'),
			'no_telp' 	        =>	$this->input->post('no_telp'),
			'tgl_daftar'		=> 	$tgl_daftar,
			'faskes' 	        =>	$this->input->post('faskes'),
			'no_kartu'			=>	$no_kartu1,
			'id_prov'			=>	$this->input->post('prop'),
			'id_kab'			=>	$this->input->post('kota')
		);
		$Query_insert = $this->Query->insert_data('biodata_pasien', $isi_data_pasien);
		if ($Query_insert > 0) {
			$data['berhasil'] = "success";

			$where = array();
			$data['kontak']=$this->Query->get_order_by('*','kontak_rspa', $where, 'tgl_diubah', 'DESC', '1');
			$data['provinsi']=$this->daerah->getProv();
			$this->session->set_flashdata('message',array('type'=>'success','text'=>'Sukses! pasien berhasil terdaftar'));
			redirect('user/biodata_pasien/'.$Query_insert,'refresh');
		}else{
			$this->session->set_flashdata('message',array('type'=>'error','text'=>'Error! pasien gagal terdaftar'));
			redirect('user/index','refresh');
		}
	}

	public function biodata_pasien($pasien_id='')
	{
		$data['biodata'] = $this->db->where('id',$pasien_id)->get('biodata_pasien')->row();
		$this->load->view('biodata_pasien', $data);
	}

}