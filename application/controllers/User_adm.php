<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_adm extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->helper('rspa');
		$this->load->model('Query');
		$this->load->model('M_daerah','daerah');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Maaf, anda belum login / sesi anda sudah habis. Silahkan untuk login lagi!')</script>";
			redirect(base_url("login"));
		}
	}
	public function tombol_notif(){
		$where = array('status' => 'belum diverifikasi');
		$data['pasien_pendaftar'] = $this->Query->get_data('biodata_pasien', $where)->result();
	}
	public function index()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array('status' => 'diterima');
		$data['statistik_pasien'] = $this->Query->duatable_group_by('kabupaten.nama_kab as nama_kab', 'biodata_pasien', 'kabupaten', 'biodata_pasien.id_kab=kabupaten.id_kab', 'status = "diterima" OR status = "keluar"', 'biodata_pasien.id_kab');
		$data['jml_kab_pasien'] = $this->Query->count_id_kab();
		$data['total_kab'] = $this->Query->count_distinct_id_kab();
		$data['maks_wil_pasien'] = $this->Query->get_order_group_by('COUNT(id) as maks_kab','biodata_pasien', $where, 'id_kab', 'COUNT(id)', 'DESC', 1);
		$data['kamar_RSPA'] = $this->Query->get_data('kamar', 'sisa_kuota_kamar > 0')->result();
		$data['count_penyakit'] = $this->Query->count_jenis_penyakit();
		$data['nama_penyakit_pasien'] = $this->Query->get_group_by('jenis_penyakit','biodata_pasien', $where, 'jenis_penyakit');
		$data['m_penyakit'] = $this->Query->get_order_group_by('COUNT(id) as maks_penyakit','biodata_pasien', $where, 'jenis_penyakit', 'COUNT(id)', 'DESC', 1);
		// var_dump($wilayah); exit(o);
		$this->load->view('beranda_adm', $data);
	}
	public function pasien()
	{	
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array('status' => 'diterima');
		$data['biodata_pasien'] = $this->Query->duatable_order_by('*','biodata_pasien', 'kabupaten', 'biodata_pasien.id_kab = kabupaten.id_kab', $where, 'biodata_pasien.id', 'DESC');
		$this->load->view('daftar_pasien', $data);
	}
	public function ambulan()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['jadwal_ambulan'] = $this->Query->duatable('*', 'ambulan', 'biodata_pasien', 'ambulan.id_pasien=biodata_pasien.id', $where);
		$this->load->view('ambulan', $data);
	}

	public function tambah_daftar_pasien()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$data['provinsi']=$this->daerah->getProv();
		$data['kamar'] = $this->Query->get_data('kamar', 'sisa_kuota_kamar > 0')->result();
		$data['kamar_penuh'] = $this->Query->satutable('COUNT(*) as total_penuh','kamar', 'sisa_kuota_kamar=0');
		$where = array();
		$data['jml_semua_kamar'] = $this->Query->satutable('COUNT(*) as total_kamar','kamar', $where);
		$this->load->view('tambah_daftar_pasien', $data);
	}
	public function profil_pasien()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id_profil = $this->uri->segment(3);
		$where1 = array('id' => $id_profil);
		$where_kec = 'id_kec = (SELECT id_kec FROM biodata_pasien WHERE id='.$id_profil.')';
		$where_kel = 'id_kel = (SELECT id_kel FROM biodata_pasien WHERE id='.$id_profil.')';
		$data['biodata_pasien'] = $this->Query->tigatable('*','biodata_pasien', 'provinsi', 'kabupaten', 'biodata_pasien.id_prov=provinsi.id_prov', 'biodata_pasien.id_kab=kabupaten.id_kab', $where1);
		$data['kecamatan'] = $this->Query->get_data('kecamatan', $where_kec)->result();
		$data['kelurahan'] = $this->Query->get_data('kelurahan', $where_kel)->result();
		$this->load->view('profil_pasien', $data);
	}

	public function jadwal_berobat_pasien()
	{	
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id = $this->uri->segment(3);
		#hapus data pasien
		$where = array(
			'id_pasien' => $id
			);
		$data['minggu_ke_sekian']= $this->Query->get_order_by('minggu_ke, tgl_berobat','jadwal_berobat_pasien', $where,'minggu_ke', 'DESC', '1');
		$data['jadwal_berobat_pasien'] = $this->Query->duatable('*', 'jadwal_berobat_pasien', 'biodata_pasien', 'jadwal_berobat_pasien.id_pasien=biodata_pasien.id', $where);
		$this->load->view('jadwal_berobat_pasien', $data);
	}

	public function ubah_profil_pasien()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id= $this->uri->segment(3);
		$where = array('id' => $id);
		$data['biodata_pasien'] = $this->Query->limatable('*','biodata_pasien', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'biodata_pasien.id_prov=provinsi.id_prov', 'biodata_pasien.id_kab=kabupaten.id_kab', 'biodata_pasien.id_kec=kecamatan.id_kec', 'biodata_pasien.id_kel=kelurahan.id_kel', $where);
		$data['provinsi']=$this->daerah->getProv();
		$this->load->view('ubah_profil_pasien',$data);
	}

	public function simpan_ubah_profil_pasien(){
		$id = $this->input->post('id');
		$this->load->library('upload');
		echo $id;
		$tgl_lahir = $this->input->post('tgl_lahir');
		#hitung umur
		$tanggal = new DateTime(trim($tgl_lahir));
		$today = new DateTime('today');
		$y = $today->diff($tanggal)->y;
		$m = $today->diff($tanggal)->m;
		$where = array(
			'id' => $id
			);
		$isi_update_pasien = array(
			'nama' 	            =>	$this->input->post('nama_pasien'),
			'tgl_lahir'         =>  $tgl_lahir,
			'umur'              =>  $y ,
			'id_prov' 	    =>	$this->input->post('prop'),
			'id_kab' 	=>	$this->input->post('kota'),
			'id_kec' 	=>	$this->input->post('kec'),
			'id_kel' 	=>	$this->input->post('kel'),
			'jenis_penyakit' 	=>	$this->input->post('jenis_penyakit'),
			'tgl_dibutuhkan' 	    =>	$this->input->post('tgl_dibutuhkan'),
			'no_ktp' 	    =>	$this->input->post('no_ktp'),
			'nama_ayah' 	    =>	$this->input->post('nama_ayah'),
			'nama_ibu'         	=>	$this->input->post('nama_ibu'),
			'no_telp' 	        =>	$this->input->post('no_telp'),
			'pekerjaan_ortu' 	=>	$this->input->post('pekerjaan'),
			'faskes'         	=>	$this->input->post('faskes'),
			'no_kartu'         	=>	$this->input->post('no_kartu') );
		$update_pasien = $this->Query->update_data('biodata_pasien', $where, $isi_update_pasien);
		if ($update_pasien) {
			# code...
		}
		redirect(base_url('user_adm/profil_pasien/'.$id));
	}
	public function simpan_data_pasien(){
		$this->load->library('upload');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$id_kamar = $this->input->post('kamar_tersedia');
		date_default_timezone_set("Asia/Jakarta");
		$tgl_daftar = date('d-m-Y');
		$tgl_masuk = date('d-m-Y');
		#hitung umur
		$tanggal = new DateTime(trim($tgl_lahir));
		// $tanggal = new DateTime('06-12-2011');
		$today = new DateTime('today');
		$y = $today->diff($tanggal)->y;
		$m = $today->diff($tanggal)->m;
		$isi_data_pasien = array(
			'nama' 	            =>	$this->input->post('nama_pasien'),
			'tgl_lahir'         =>  $tgl_lahir,
			'umur'              =>  $y ,
			'jenis_penyakit' 	=>	$this->input->post('jenis_penyakit'),
			'tgl_dibutuhkan' 	=>	$this->input->post('tgl_dibutuhkan'),
			'no_ktp' 	   		=>	$this->input->post('no_ktp'),
			'nama_ayah' 	    =>	$this->input->post('nama_ayah'),
			'nama_ibu'         	=>	$this->input->post('nama_ibu'),
			'no_telp' 	        =>	$this->input->post('no_telp'),
			'pekerjaan_ortu' 	=>	$this->input->post('pekerjaan'),
			'id_prov' 	   		=>	$this->input->post('prop'),
			'id_kab' 			=>	$this->input->post('kota'),
			'id_kec' 			=>	$this->input->post('kec'),
			'id_kel' 			=>	$this->input->post('kel'),
			'faskes'         	=>	$this->input->post('faskes'),
			'no_kartu'         	=>	$this->input->post('no_kartu'),
			'status'         	=>	'diterima',
			'tgl_daftar'        =>	$tgl_daftar
			);
		$this->Query->insert_data('biodata_pasien', $isi_data_pasien);
		$where_biodata = array(
			'no_kartu' => $this->input->post('no_kartu')
			);
		$data['biodata_pasien'] = $this->Query->get_data('biodata_pasien', $where_biodata)->result();
		foreach ($data['biodata_pasien'] as $b) {
			$id = $b->id;
		}
		$jadwal_inap = array(
			'id_pasien' => $id,
			'tgl_masuk' => $tgl_masuk,
			'id_kamar' => $id_kamar
			);
		$this->Query->insert_data('jadwal_inap_pasien', $jadwal_inap);
		$where_kamar = array(
			'id_kamar' => $id_kamar
			);
		$data['kamar'] = $this->Query->get_data('kamar', $where_kamar)->result();
		foreach ($data['kamar'] as $k) {
			$sisa_kuota = $k->sisa_kuota_kamar;
		}
		$isi_update_kamar = array(
			'sisa_kuota_kamar' 	            =>	$sisa_kuota-1,
			);
		$this->Query->update_data('kamar', $where_kamar, $isi_update_kamar);
		$jadwal_berobat = array(
			'minggu_ke' => 1,
			'id_pasien' => $id
			);
		$this->Query->insert_data('jadwal_berobat_pasien', $jadwal_berobat);
		redirect(base_url('user_adm/pasien'));
	}
	public function hapus_data_pasien_inap_RSPA(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_pasien' => $id
			);
		$data['kamar'] = $this->Query->duatable('*', 'kamar', 'jadwal_inap_pasien', 'kamar.id_kamar=jadwal_inap_pasien.id_kamar', $where);
		foreach ($data['kamar'] as $k) {
			$sisa_kuota = $k->sisa_kuota_kamar;
			$id_kamar = $k->id_kamar;
		}
		$where_kamar = array(
			'id_kamar' => $id_kamar
			);
		$isi_update_kamar = array(
			'sisa_kuota_kamar' 	 =>	$sisa_kuota+1,
			);
		$this->Query->update_data('kamar', $where_kamar, $isi_update_kamar);
		$where = array(
			'id' => $id
			);
		$this->Query->hapus_data('biodata_pasien', $where);
		redirect(base_url('user_adm/pasien'));
	}
	public function hapus_data_pasien(){
		$id = $this->uri->segment(3);
		$where = array(
			'id' => $id
			);
		$this->Query->hapus_data('biodata_pasien', $where);
		redirect(base_url('user_adm/pasien'));
	}
	public function hapus_data_pasien_pendaftar(){
		$id = $this->uri->segment(3);
		$where = array(
			'id' => $id
			);
		$this->Query->hapus_data('biodata_pasien', $where);
		redirect(base_url('user_adm/pasien_pendaftar'));
	}
	public function pasien_pendaftar()
	{	
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array('status' => 'belum diverifikasi');
		$data['pendaftar'] = $this->Query->duatable_order_by('*','biodata_pasien', 'kabupaten', 'biodata_pasien.id_kab = kabupaten.id_kab', $where, 'biodata_pasien.id', 'DESC');
		$this->load->view('pasien_pendaftar', $data);
	}


	public function profil_pendaftar()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id_profil = $this->uri->segment(3);
		$where1 = array('id' => $id_profil);
		$where_kec = 'id_kec = (SELECT id_kec FROM biodata_pasien WHERE id='.$id_profil.')';
		$where_kel = 'id_kel = (SELECT id_kel FROM biodata_pasien WHERE id='.$id_profil.')';
		$data['pendaftar'] = $this->Query->tigatable('*','biodata_pasien', 'provinsi', 'kabupaten', 'biodata_pasien.id_prov=provinsi.id_prov', 'biodata_pasien.id_kab=kabupaten.id_kab', $where1);
		$data['kecamatan'] = $this->Query->get_data('kecamatan', $where_kec)->result();
		$data['kelurahan'] = $this->Query->get_data('kelurahan', $where_kel)->result();
		// var_dump(); exit(0);
		$data['kamar'] = $this->Query->get_data('kamar', 'sisa_kuota_kamar > 0')->result();
		$data['kamar_penuh'] = $this->Query->satutable('COUNT(*) as total_penuh','kamar', 'sisa_kuota_kamar=0');
		$where = array();
		$data['jml_semua_kamar'] = $this->Query->satutable('COUNT(*) as total_kamar','kamar', $where);
		$this->load->view('profil_pendaftar', $data);
	}

	public function kamar()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['kamar'] = $this->Query->get_data('kamar', $where)->result();
		$this->load->view('kamar', $data);
	}

	public function jadwal_inap_pasien()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'tgl_keluar' => NULL
			);
		$data['jadwal_inap'] = $this->Query->tigatable('*', 'jadwal_inap_pasien', 'kamar', 'biodata_pasien', 'jadwal_inap_pasien.id_kamar=kamar.id_kamar', 'jadwal_inap_pasien.id_pasien=biodata_pasien.id', $where);
		$this->load->view('jadwal_inap_pasien', $data);
	}

	public function rekap_belanja()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['rekap_belanja'] = $this->Query->get_data('rekap_belanja', $where)->result();
		$this->load->view('rekap_belanja', $data);
	}

	public function aset()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['aset'] = $this->Query->get_data('aset', $where)->result();
		$this->load->view('aset', $data);
	}
	public function rekap_operasional_ambulan()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['rekap_operasional'] = $this->Query->tigatable_rekap_operasional('pasien_diantar', 'rekap_operasional', 'biodata_pasien', 'rekap_operasional.id_rekap = pasien_diantar.id_rekap_operasional', 'biodata_pasien.id = pasien_diantar.id_pasien', $where, 'id_rekap');
		$this->load->view('rekap_operasional_ambulan', $data);
	}
	public function terima_pasien(){
		$this->load->library('upload');
		$id = $this->uri->segment(3);
		$id_kamar = $this->input->post('kamar_tersedia');
		$where = array(
			'id' => $id
			);
		$isi_update_pasien = array(
			'status' 	            =>	'diterima'
			);
		date_default_timezone_set("Asia/Jakarta");
		$tgl_masuk = date('d-m-Y');
		$terima_pasien = $this->Query->update_data('biodata_pasien', $where, $isi_update_pasien);
		$jadwal_inap = array(
			'id_pasien' => $id,
			'tgl_masuk' => $tgl_masuk,
			'id_kamar' => $id_kamar
			);
		$this->Query->insert_data('jadwal_inap_pasien', $jadwal_inap);
		$where_kamar = array(
			'id_kamar' => $id_kamar
			);
		$data['kamar'] = $this->Query->get_data('kamar', $where_kamar)->result();
		foreach ($data['kamar'] as $k) {
			$sisa_kuota = $k->sisa_kuota_kamar;
		}
		$isi_update_kamar = array(
			'sisa_kuota_kamar' 	            =>	$sisa_kuota-1,
			);
		$this->Query->update_data('kamar', $where_kamar, $isi_update_kamar);
		$jadwal_berobat = array(
			'minggu_ke' => 1,
			'id_pasien' => $id
			);
		$this->Query->insert_data('jadwal_berobat_pasien', $jadwal_berobat);
		redirect(base_url('user_adm/pasien_pendaftar'));

	}

	public function tolak_pasien($id){
		// $id = $this->uri->segment(3);
		$where = array(
			'id' => $id
			);
		$isi_update_pasien = array(
			'status' => 'ditolak'
			);
		$tolak_pasien = $this->Query->update_data('biodata_pasien', $where, $isi_update_pasien);
		// redirect(base_url('user_adm/pasien_pendaftar'));
		redirect(base_url('user_adm/daftar_pasien_ditolak/'));

	}

	public function daftar_pasien_ditolak()
	{	
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array('status' => 'ditolak');
		$data['pasien_ditolak'] = $this->Query->duatable_order_by('*','biodata_pasien', 'kabupaten', 'biodata_pasien.id_kab = kabupaten.id_kab', $where, 'biodata_pasien.id', 'DESC');
		$this->load->view('pasien_ditolak', $data);
	}

	public function riwayat_inap_pasien()
	{	
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array('tgl_keluar' => 'IS NOT NULL');
		$data['pasien_keluar'] = $this->Query->tigatable_group_by('*','biodata_pasien', 'jadwal_inap_pasien', 'kabupaten', 'biodata_pasien.id=jadwal_inap_pasien.id_pasien', 'biodata_pasien.id_kab=kabupaten.id_kab', 'tgl_keluar IS NOT NULL', 'nama');
		$this->load->view('riwayat_inap_pasien', $data);
	}

	public function tombol_pasien_keluar(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_pasien' => $id
			);
		$data['kamar'] = $this->Query->duatable('*', 'kamar', 'jadwal_inap_pasien', 'kamar.id_kamar=jadwal_inap_pasien.id_kamar', $where);
		foreach ($data['kamar'] as $k) {
			$sisa_kuota = $k->sisa_kuota_kamar;
			$id_kamar = $k->id_kamar;
		}
		$where_kamar = array(
			'id_kamar' => $id_kamar
			);
		$isi_update_kamar = array(
			'sisa_kuota_kamar' 	            =>	$sisa_kuota+1,
			);
		$this->Query->update_data('kamar', $where_kamar, $isi_update_kamar);
		
		date_default_timezone_set("Asia/Jakarta");
		$tgl_keluar = date('d-m-Y');
		$isi_update_tgl = array(
			'tgl_keluar' => $tgl_keluar,
			'id_kamar' => NULL
			);
		$tgl_pasien_keluar = $this->Query->update_data('jadwal_inap_pasien', $where, $isi_update_tgl);
		$isi_update_status = array(
			'status' => 'keluar'
			);
		$where_status = array(
			'id' => $id
			);
		$ubah_status = $this->Query->update_data('biodata_pasien', $where_status, $isi_update_status);

		redirect(base_url('user_adm/jadwal_inap_pasien'));
	}
	public function profil_riwayat_inap_pasien()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id_profil = $this->uri->segment(3);
		$where1 = array('id' => $id_profil);
		$data['pasien_keluar'] = $this->Query->enamtable_limit('*','biodata_pasien', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'jadwal_inap_pasien', 'biodata_pasien.id_prov=provinsi.id_prov', 'biodata_pasien.id_kab=kabupaten.id_kab', 'biodata_pasien.id_kec=kecamatan.id_kec', 'biodata_pasien.id_kel=kelurahan.id_kel', 'biodata_pasien.id=jadwal_inap_pasien.id_pasien', $where1,1);
		$data['riwayat_inap'] = $this->Query->get_data('jadwal_inap_pasien', 'id_pasien = '.$id_profil.' AND tgl_keluar IS NOT NULL')->result();
		$data['kamar'] = $this->Query->get_data('kamar', 'sisa_kuota_kamar > 0')->result();
		$data['kamar_penuh'] = $this->Query->satutable('COUNT(*) as total_penuh','kamar', 'sisa_kuota_kamar=0');
		$where = array();
		$data['jml_semua_kamar'] = $this->Query->satutable('COUNT(*) as total_kamar','kamar', $where);
		$this->load->view('profil_riwayat_inap_pasien', $data);
	}

	public function pasien_inap_lagi(){
		$id_profil = $this->uri->segment(3);
		date_default_timezone_set("Asia/Jakarta");
		$tgl_masuk = date('d-m-Y');
		$id_kamar = $this->input->post('kamar_tersedia');
		$isi_update_status = array(
			'status' => 'diterima'
			);
		$where_status = array(
			'id' => $id_profil
			);
		$ubah_status = $this->Query->update_data('biodata_pasien', $where_status, $isi_update_status);
		$where_kamar = array(
			'id_kamar' => $id_kamar
			);
		$data['kamar'] = $this->Query->get_data('kamar', $where_kamar)->result();
		foreach ($data['kamar'] as $k) {
			$sisa_kuota = $k->sisa_kuota_kamar;
		}
		$isi_update_kamar = array(
			'sisa_kuota_kamar' 	            =>	$sisa_kuota-1,
			);
		$this->Query->update_data('kamar', $where_kamar, $isi_update_kamar);
		$jadwal_berobat = array(
			'minggu_ke' => 1,
			'id_pasien' => $id
			);
		$pasien_inap_lagi = array(
			'id_pasien' => $id_profil,
			'tgl_masuk' => $tgl_masuk,
			'id_kamar' => $id_kamar
			);
		$this->Query->insert_data('jadwal_inap_pasien', $pasien_inap_lagi);
		redirect(base_url('user_adm/jadwal_inap_pasien/'));
	}

	public function simpan_jadwal_berobat(){
		$id = $this->uri->segment(3);
		$this->load->library('upload');
		$tgl_berobat = $this->input->post('tgl_berobat_pasien');
		$tanggal = new DateTime(trim($tgl_berobat));
		$where = array(
			'id_pasien' => $this->input->post('id_pasien')
			);
		$data['tgl_sebelum'] = $this->Query->get_order_by('tgl_berobat','jadwal_berobat_pasien', $where,'id_jadwal', 'DESC', '1');
		
		// var_dump($data['tgl_sebelum']);exit(0);

		foreach ($data['tgl_sebelum'] as $t) {
			$tgl = new DateTime(trim($t->tgl_berobat));

			$days = $tanggal->diff($tgl)->d;
			if ($days <= 7) {
				$status_berobat = 'tepat waktu';
				$alasan_terlambat = '-';
			} else {
				$status_berobat = 'terlambat';
				echo '<script> var alasan = prompt("Kenapa Terlambat?");</script>';
				$alasan_terlambat = $this->input->post('alasan');
			};
		}
		$isi_data_jadwal = array(
			'minggu_ke' => $this->input->post('minggu_ke'),
			'tgl_berobat' => $tgl_berobat,
			'id_pasien' =>  $this->input->post('id_pasien'),
			'status_berobat' => $status_berobat,
			'alasan_terlambat' => $alasan_terlambat,
			'kestabilan_kondisi' => $this->input->post('kestabilan_kondisi')
			);
		$id_pasien = $this->input->post('id_pasien');
		$this->Query->insert_data('jadwal_berobat_pasien', $isi_data_jadwal);
		redirect(base_url('user_adm/jadwal_berobat_pasien/'.$id_pasien));
	}

	public function simpan_tgl_awal_berobat(){
		$id = $this->uri->segment(3);
		$this->load->library('upload');
		$tgl_berobat = $this->input->post('tgl_berobat_pasien');
		$tanggal = new DateTime(trim($tgl_berobat));
		$status_berobat = $this->input->post('status_berobat');
		$alasan_terlambat = '-';
		$where = array(
			'id_pasien' => $this->input->post('id_pasien')
			);
		$isi_data_pasien = array(
			'tgl_berobat' => $tgl_berobat,
			'status_berobat' => $status_berobat,
			'kestabilan_kondisi' => $this->input->post('kestabilan_kondisi')
			);
		$id_pasien = $this->input->post('id_pasien');
		$update_tgl_awal = $this->Query->update_data('jadwal_berobat_pasien', $where, $isi_data_pasien);
		redirect(base_url('user_adm/jadwal_berobat_pasien/'.$id_pasien));
	}

	public function kelola_kontak()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array();
		$data['kelola_kontak'] = $this->Query->get_data('kontak_rspa', $where)->result();
		$this->load->view('kelola_kontak', $data);
	}

	public function simpan_alasan_ditolak()
	{
		$id = $this->uri->segment(3);
		$this->load->library('upload');
		$alasan_ditolak = $this->input->post('alasan');
		$where = array(
			'id_pasien' => $id
			);

		$i = 0;
		foreach ($alasan_ditolak as $alasan) {
			$isi_alasan = array(
				'alasan' => $alasan_ditolak[$i],
				'id_pasien' => $id
				);
			$this->Query->insert_data('alasan_ditolak', $isi_alasan);
			$i++;
		}

		$this->tolak_pasien($id);
		// redirect(base_url('user_adm/daftar_pasien_ditolak/'));
	}
	public function simpan_alasan_terlambat(){
		$id = $this->uri->segment(3);
		$id_jadwal = $this->input->post('id_jadwal');
		$this->load->library('upload');
		$alasan_terlambat = $this->input->post('alasan_terlambat');
		// var_dump($id_jadwal);exit(0);
		// var_dump($alasan_terlambat);exit(0);
		$where = array(
			'id_jadwal' => $id_jadwal
			);
		$isi_alasan = array(
			'alasan_terlambat' => $alasan_terlambat
			);
		$update_alasan_terlambat = $this->Query->update_data('jadwal_berobat_pasien', $where, $isi_alasan);
		redirect(base_url('user_adm/jadwal_berobat_pasien/'.$id));
	}

	public function profil_pasien_ditolak()
	{
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id_profil = $this->uri->segment(3);
		$where1 = array('id' => $id_profil);
		$data['pasien_ditolak'] = $this->Query->limatable('*','biodata_pasien', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'biodata_pasien.id_prov=provinsi.id_prov', 'biodata_pasien.id_kab=kabupaten.id_kab', 'biodata_pasien.id_kec=kecamatan.id_kec', 'biodata_pasien.id_kel=kelurahan.id_kel', $where1);
		$data['kamar'] = $this->Query->get_data('kamar', 'sisa_kuota_kamar > 0')->result();
		$data['kamar_penuh'] = $this->Query->satutable('COUNT(*) as total_penuh','kamar', 'sisa_kuota_kamar=0');
		$where = array();
		$data['jml_semua_kamar'] = $this->Query->satutable('COUNT(*) as total_kamar','kamar', $where);
		$where_ditolak = array('id_pasien' => $id_profil);
		$data['alasan_ditolak'] = $this->Query->get_data('alasan_ditolak', $where_ditolak)->result();
		$this->load->view('profil_pasien_ditolak', $data);
	}

	public function chart()
	{	
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$json_enc = json_encode($data['pasien_pendaftar']);
		echo $json_enc;

		$labels = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		$labels = json_encode($labels);

		$values = array(10, 8, 6, 5, 12, 8, 16, 17, 6, 7, 6, 10);
		$values = json_encode($values);

		$data['labels'] = $labels;
		$data['values'] = $values; 
		$this->load->view('chart', $data);
	}

	public function tambah_aset(){
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$this->load->view('tambah_aset', $data);
	}
	public function simpan_data_aset(){
		$this->load->library('upload');
		$isi_data_aset = array(
			'nama_aset' 	=>	$this->input->post('nama_aset'),
			'jumlah' 	=>	$this->input->post('jml_aset')
			);
		$this->Query->insert_data('aset', $isi_data_aset);
		redirect(base_url('user_adm/aset'));
	}
	public function tambah_kamar(){
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$this->load->view('tambah_kamar', $data);
	}
	public function simpan_data_kamar(){
		$this->load->library('upload');
		$isi_data_kamar = array(
			'nama_kamar' 	=>	$this->input->post('nama_kamar'),
			'kuota_kamar' 	=>	$this->input->post('kuota'),
			'sisa_kuota_kamar' 	=>	$this->input->post('kuota')
			);
		$this->Query->insert_data('kamar', $isi_data_kamar);
		redirect(base_url('user_adm/kamar'));
	}
	public function hapus_data_kamar(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_kamar' => $id
			);
		$this->Query->hapus_data('kamar', $where);
		redirect(base_url('user_adm/kamar'));
	}
	public function ubah_kamar(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'id_kamar' => $id
			);
		$data['kamar'] =  $this->Query->get_data('kamar', $where)->result();
		$this->load->view('ubah_kamar', $data);
	}

	public function simpan_ubah_kamar(){
		$this->load->library('upload');
		$id = $this->input->post('id_kamar');
		$where = array(
			'id_kamar' => $id
			);
		$isi_data_kamar = array(
			'nama_kamar' 	=>	$this->input->post('nama_kamar'),
			'kuota_kamar' 	=>	$this->input->post('kuota'),
			'sisa_kuota_kamar' => $this->input->post('kuota')
			);
		// var_dump($id); exit(o);
		$this->Query->update_data('kamar', $where, $isi_data_kamar);
		redirect(base_url('user_adm/kamar'));
	}

	public function ubah_kontak(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'id' => $id
			);
		$data['kontak'] =  $this->Query->get_data('kontak_rspa', $where)->result();
		$this->load->view('ubah_kontak', $data);
	}

	public function simpan_ubah_kontak(){
		$this->load->library('upload');
		$id = $this->input->post('id_kontak');
		date_default_timezone_set("Asia/Jakarta");
		$today = date('d-m-Y');
		$where = array(
			'id' => $id
			);
		$isi_data_kamar = array(
			'no_telp' 	=>	$this->input->post('no_telp'),
			'email' 	=>	$this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'tgl_diubah' => $today
			);
		// var_dump($id); exit(o);
		$this->Query->update_data('kontak_rspa', $where, $isi_data_kamar);
		redirect(base_url('user_adm/kelola_kontak'));
	}

	public function tambah_rekap_belanja(){
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$this->load->view('tambah_rekap_belanja', $data);
	}

	public function simpan_rekap_belanja(){
		$this->load->library('upload');
		$isi_data_rekap_belanja = array(
			'nama_barang' 	=>	$this->input->post('nama_barang'),
			'jenis_barang' 	=>	$this->input->post('jenis_barang'),
			'harga' 	=>	$this->input->post('harga'),
			'jumlah' 	=>	$this->input->post('jml_barang'),
			'tgl_belanja' 	=>	$this->input->post('tgl_belanja'),
			);
		$this->Query->insert_data('rekap_belanja', $isi_data_rekap_belanja);
		redirect(base_url('user_adm/rekap_belanja'));
	}

	public function hapus_data_aset(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_aset' => $id
			);
		$this->Query->hapus_data('aset', $where);
		redirect(base_url('user_adm/aset'));
	}

	public function ubah_rekap_belanja(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'id_belanja' => $id
			);
		$data['rekap_belanja'] =  $this->Query->get_data('rekap_belanja', $where)->result();
		$this->load->view('ubah_rekap_belanja', $data);
	}

	public function simpan_ubah_rekap_belanja(){
		$this->load->library('upload');
		$id = $this->input->post('id_belanja');
		$where = array(
			'id_belanja' => $id
			);
		$isi_data_rekap_belanja = array(
			'nama_barang' 	=>	$this->input->post('nama_barang'),
			'jenis_barang' 	=>	$this->input->post('jenis_barang'),
			'harga' 	=>	$this->input->post('harga'),
			'jumlah' 	=>	$this->input->post('jml_barang'),
			'tgl_belanja' 	=>	$this->input->post('tgl_belanja'),
			);
		// var_dump($id); exit(o);
		$this->Query->update_data('rekap_belanja', $where, $isi_data_rekap_belanja);
		redirect(base_url('user_adm/rekap_belanja'));
	}

	public function hapus_rekap_belanja(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_belanja' => $id
			);
		$this->Query->hapus_data('rekap_belanja', $where);
		redirect(base_url('user_adm/rekap_belanja'));
	}

	public function ubah_data_aset(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'id_aset' => $id
			);
		$data['aset'] =  $this->Query->get_data('aset', $where)->result();
		$this->load->view('ubah_aset', $data);
	}

	public function simpan_ubah_data_aset(){
		$this->load->library('upload');
		$id = $this->input->post('id_aset');
		$where = array(
			'id_aset' => $id
			);
		$isi_ubah_aset = array(
			'nama_aset' 	=>	$this->input->post('nama_aset'),
			'jumlah' 	=>	$this->input->post('jml_aset')
			);
		// var_dump($id); exit(o);
		$this->Query->update_data('aset', $where, $isi_ubah_aset);
		redirect(base_url('user_adm/aset'));
	}

	public function tambah_rekap_operasional(){
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array("");
		$data['biodata_pasien'] = $this->Query->get_data('biodata_pasien', $where)->result();
		$this->load->view('tambah_rekap_operasional', $data);
	}
	public function simpan_rekap_operasional()
	{
		$this->load->library('upload');
		$id_pasien = $this->input->post('id_pasien');
		// $where = array(
		// 	'tgl_berangkat' => $this->input->post('tgl_berangkat')
		// 	);
		$isi_data_rekap_operasional = array(
			'tgl_berangkat' 	=>	$this->input->post('tgl_berangkat'),
			'jam_berangkat' 	=>	$this->input->post('jam_berangkat'),
			'lokasi_tujuan' 	=>	$this->input->post('lokasi'),
			'biaya' 	=>	$this->input->post('biaya')
			);
		$where = array();
		$this->Query->insert_data('rekap_operasional', $isi_data_rekap_operasional);
		$data['rekap'] = $this->Query->get_order_by('id_rekap', 'rekap_operasional', $where, 'id_rekap', 'DESC', 1);
		foreach ($data['rekap'] as $id) {
			$id_rekap = $id->id_rekap;
		}
		$i = 0;
		foreach ($id_pasien as $id) {
			$isi_data_pasien_diantar = array(
				'id_rekap_operasional' => $id_rekap,
				'id_pasien' 	=>	$id_pasien[$i]
				);
			
			$this->Query->insert_data('pasien_diantar', $isi_data_pasien_diantar);
			$i++;
			// var_dump($isi_data_pasien_diantar);exit(0);

		} 
		redirect(base_url('user_adm/rekap_operasional_ambulan'));
	}
	public function hapus_rekap_operasional(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_rekap' => $id
			);
		$this->Query->hapus_data('rekap_operasional', $where);
		redirect(base_url('user_adm/rekap_operasional_ambulan'));
	}

	public function ubah_rekap_operasional(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array("");
		$data['biodata_pasien'] = $this->Query->get_data('biodata_pasien', $where)->result();
		$where_rekap = array(
			'id_rekap' => $id
			);
		// $data['tampil_rekap'] = $this->Query->get_data('rekap_operasional', $where_rekap)->result();
		// foreach ($data['tampil_rekap'] as $t) {
		// 	$tgl_berangkat = $t->tgl_berangkat;
		// 	$jam_berangkat = $t->jam_berangkat;
		// }
		// $where_waktu_rekap = array(
		// 	'tgl_berangkat' => $tgl_berangkat,
		// 	'jam_berangkat' => $jam_berangkat
		// 	);

		$data['rekap_tanggal'] =  $this->Query->tigatable_limit('*', 'pasien_diantar','rekap_operasional', 'biodata_pasien', 'rekap_operasional.id_rekap=pasien_diantar.id_rekap_operasional', 'pasien_diantar.id_pasien=biodata_pasien.id', $where_rekap, 1);
		$data['rekap_pasien_diantar'] =  $this->Query->tigatable('*', 'pasien_diantar','rekap_operasional', 'biodata_pasien', 'rekap_operasional.id_rekap=pasien_diantar.id_rekap_operasional', 'pasien_diantar.id_pasien=biodata_pasien.id', $where_rekap);
		$this->load->view('ubah_rekap_operasional', $data);
	}

	public function simpan_ubah_rekap_operasional(){
		$this->load->library('upload');
		$id = $this->input->post('id_rekap');
		$tgl_berangkat = $this->input->post('tgl_berangkat');
		$jam_berangkat = $this->input->post('jam_berangkat');
		$id_pasien = $this->input->post('id_pasien');
		$lokasi = $this->input->post('lokasi');
		$biaya = $this->input->post('biaya');
		$where = array(
			'id_rekap' => $id
			);
		$isi_ubah_rekap_operasional = array(
			'tgl_berangkat' 	=>	$tgl_berangkat,
			'jam_berangkat' 	=>	$jam_berangkat,
			'lokasi_tujuan' 	=>	$lokasi,
			'biaya' 			=>	$biaya
			);
		$this->Query->update_data('rekap_operasional', $where, $isi_ubah_rekap_operasional);
		$where1 = array(
			'id_rekap_operasional' => $id
			);
		$data['id_pasien_diantar'] = $this->Query->get_data('pasien_diantar', $where1)->result();
		$id_pasien_diantar = array();
		foreach ($data['id_pasien_diantar'] as $p) {
			
			array_push($id_pasien_diantar, $p->id);
		}
		// var_dump($id_pasien_diantar); exit(o);
		$i = 0;
		foreach ($id_pasien as $id) {
			$where_diantar= array(
				'id' => $id_pasien_diantar[$i]
				);
			$isi_ubah_pasien_diantar = array(
				'id_pasien' 		=>	$id_pasien[$i]
				);
			$this->Query->update_data('pasien_diantar', $where_diantar, $isi_ubah_pasien_diantar);
			$i++;
		}
		// var_dump($isi_ubah_rekap_operasional); exit(o);


		redirect(base_url('user_adm/rekap_operasional_ambulan'));
	}

	public function profil_admin()
	{
		$username = $this->session->userdata('username');
		// var_dump($this->session->userdata($data_session)); exit(o);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$id_profil = $this->uri->segment(3);
		$where = array('username' => $username);
		$data['admin'] = $this->Query->get_data('user_admin', $where)->result();
		$this->load->view('profil_admin', $data);
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
	public function ubah_profil_admin(){
		$no_ktp = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'no_ktp' => $no_ktp
			);
		$data['profil_admin'] =  $this->Query->get_data('user_admin', $where)->result();
		$this->load->view('ubah_profil_admin', $data);
	}	

	public function simpan_ubah_profil_admin(){
		$this->load->library('upload');
		$no_ktp = $this->input->post('no_ktp');
		// $img_profil_admin = $this->input->post('img_profil_admin');

		$config['upload_path']          = './assets/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		// $this->upload->do_upload('img_profil_admin');
		// var_dump($this->input->post('img_profil_admin')); exit(o);
		if ( ! $this->upload->do_upload('img_profil_admin'))
		{
			// $error = array('error' => $this->upload->display_errors());

			// $this->load->view('profil_admin', $error);
			echo "<script> alert('Foto tidak masuk !!'); history.back(); </script>";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('profil_admin', $data);
		}

		// $where = array(
		// 	'no_ktp' => $no_ktp
		// 	);
		// $password_lama = $this->input->post('password_lama');
		// $password_baru = $this->input->post('password_baru');
		// $ulangi_password_baru = $this->input->post('ulangi_password_baru');

		// if ($password_baru == NULL || $ulangi_password_baru == NULL) {
		// 	$password_fix = $password_lama;
		// 	$isi_ubah_rekap_operasional = array(
		// 		'nama' 	=>	$this->input->post('nama_admin'),
		// 		'username' 	=>	$this->input->post('username'),
		// 		'password' 	=>	$password_fix,
		// 		'no_telp' 	=>	$this->input->post('no_telp'),
		// 		'jenis_kelamin' 	=>	$this->input->post('jenis_kelamin'),
		// 		'alamat' 	=>	$this->input->post('alamat')
		// 		);
		// 	$this->Query->update_data('user_admin', $where, $isi_ubah_rekap_operasional);
		// 	redirect(base_url('user_adm/profil_admin/'.$no_ktp ));
		// } else {
		// 	if ($password_baru === $ulangi_password_baru){
		// 		$password_fix = $password_baru;
		// 		$isi_ubah_rekap_operasional = array(
		// 			'nama' 	=>	$this->input->post('nama_admin'),
		// 			'username' 	=>	$this->input->post('username'),
		// 			'password' 	=>	$password_fix,
		// 			'no_telp' 	=>	$this->input->post('no_telp'),
		// 			'jenis_kelamin' 	=>	$this->input->post('jenis_kelamin'),
		// 			'alamat' 	=>	$this->input->post('alamat')
		// 			);
		// 		$this->Query->update_data('user_admin', $where, $isi_ubah_rekap_operasional);
		// 		redirect(base_url('user_adm/profil_admin/'.$no_ktp ));
		// 	} else {
		// 		echo "<script> alert('Password baru yang anda masukkan tidak sama !!'); history.back(); </script>";
		// 	}
		// }
	// var_dump($password_fix); exit(o);

	}
	public function ubah_jadwal_berobat(){
		$id = $this->uri->segment(3);
		$data['jml_notif'] = $this->Query->jml_notif();
		$data['pasien_pendaftar'] = $this->Query->notif_pendaftar();
		$where = array(
			'id_jadwal' => $id
			);
		$data['jadwal_berobat'] =  $this->Query->get_data('jadwal_berobat_pasien', $where)->result();
		$this->load->view('ubah_jadwal_berobat_pasien', $data);
	}

	public function simpan_ubah_jadwal_berobat(){
		$this->load->library('upload');
		$id = $this->input->post('id_jadwal');
		$id_pasien = $this->input->post('id_pasien');
		$tgl_berobat = $this->input->post('tgl_berobat');
		$minggu_ke = $this->input->post('minggu_ke');
		$minggu_sebelum = $minggu_ke-1;
		$tanggal = new DateTime(trim($tgl_berobat));
		$where_tgl_sebelum = array(
			'id_pasien' => $this->input->post('id_pasien')
			);

		$data['tgl_sebelum'] = $this->Query->get_order_by('tgl_berobat','jadwal_berobat_pasien', 'id_pasien = '.$id_pasien.' AND minggu_ke = '.$minggu_sebelum,'id_jadwal', 'DESC', '1');
		if ($minggu_ke == 1) {
			$status_berobat = $this->input->post('status_berobat');
			$alasan_terlambat = NULL;
		} else {
			foreach ($data['tgl_sebelum'] as $t) {
				$tgl = new DateTime(trim($t->tgl_berobat));

				$days = $tanggal->diff($tgl)->d;
				if ($days <= 7) {
					$status_berobat = 'tepat waktu';
					$alasan_terlambat = NULL;
				} else {
					$status_berobat = 'terlambat';
					$alasan_terlambat = $this->input->post('alasan_terlambat');
				}
			}
		}

		// var_dump($tgl);exit(0);
		$where = array(
			'id_jadwal' => $id
			);
		$isi_data_jadwal_berobat = array(
			'tgl_berobat' 	=>	$tgl_berobat,
			'kestabilan_kondisi' 	=>	$this->input->post('kestabilan_kondisi'),
			'status_berobat' 	=>	$status_berobat,
			'alasan_terlambat' 	=>	$alasan_terlambat
			);
		// var_dump($id); exit(o);
		$this->Query->update_data('jadwal_berobat_pasien', $where, $isi_data_jadwal_berobat);
		redirect(base_url('user_adm/jadwal_berobat_pasien/'.$id_pasien));
	}
	public function hapus_data_jadwal_berobat(){
		$id = $this->uri->segment(3);
		$where = array(
			'id_jadwal' => $id
			);
		$data['jadwal_berobat'] = $this->Query->get_order_by('id_pasien','jadwal_berobat_pasien', $where, 'id_jadwal', 'DESC', 1);
		foreach ($data['jadwal_berobat'] as $jb) {
			$id_pasien = $jb->id_pasien;
		}
		$this->Query->hapus_data('jadwal_berobat_pasien', $where);
		redirect(base_url('user_adm/jadwal_berobat_pasien/'.$id_pasien));
	}

	public function aksi_upload(){
		$config['upload_path']          = 'base_url(assets/images/)';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('v_upload_sukses', $data);
		}
	}
	public function upload_image()
	{

	}
}