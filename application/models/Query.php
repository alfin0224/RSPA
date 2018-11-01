<?php 

class Query extends CI_Model{

	function get_data($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function insert_data($table, $data)
	{
		$this->db->insert($table, $data);
	}
	function hapus_data($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function satutable($select, $table1, $where)
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	function duatable($select, $table1, $table2, $join, $where)
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->join($table2, $join);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function notif_pendaftar()
	{
		$this->db->select('nama, jenis_penyakit');
		$this->db->from('biodata_pasien');
		$where = array('status' => 'belum diverifikasi');
		$this->db->where($where);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}
	function count_jenis_penyakit()
	{
		$this->db->select('COUNT(jenis_penyakit) as jml_penyakit');
		$this->db->from('biodata_pasien');
		$this->db->where('status = "diterima"');
		$this->db->group_by('jenis_penyakit');
		$query = $this->db->get();
		return $query->result();
	}
	function count_id_kab()
	{
		$this->db->select('COUNT(id_kab) as jml_kab_pasien');
		$this->db->from('biodata_pasien');
		$this->db->where('status = "diterima" OR status = "keluar"');
		$this->db->group_by('id_kab');
		$query = $this->db->get();
		return $query->result();
	}


	function count_distinct_id_kab()
	{
		$this->db->select('COUNT(DISTINCT(id_kab)) as total_kab');
		$this->db->from('biodata_pasien');
		$this->db->where('status = "diterima" OR status = "keluar"');
		$query = $this->db->get();
		return $query->result();
	}
	function jml_notif()
	{
		$this->db->select('COUNT(*) as jml');
		$this->db->from('biodata_pasien');
		$where = array('status' => 'belum diverifikasi');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	
	function tigatable($select, $table1, $table2, $table3, $join1, $join2, $where){
		$this->db->select($select);    
		$this->db->from($table1);
		$this->db->join($table2, $join1);
		$this->db->join($table3, $join2);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	function tigatable_limit($select, $table1, $table2, $table3, $join1, $join2, $where, $nilai){
		$this->db->select($select);    
		$this->db->from($table1);
		$this->db->join($table2, $join1);
		$this->db->join($table3, $join2);
		$this->db->where($where);
		$this->db->limit($nilai);
		$query = $this->db->get();
		return $query->result();
	}

	function tigatable_group_by($select, $table1, $table2, $table3, $join1, $join2, $where, $group){
		$this->db->select($select);    
		$this->db->from($table1);
		$this->db->join($table2, $join1);
		$this->db->join($table3, $join2);
		$this->db->where($where);
		$this->db->group_by($group);
		$query = $this->db->get();
		return $query->result();
	}


	function limatable($select, $table1, $table2, $table3, $table4, $table5,  $join1, $join2, $join3, $join4, $where){
		$this->db->select($select);    
		$this->db->from($table1);
		$this->db->join($table2, $join1);
		$this->db->join($table3, $join2);
		$this->db->join($table4, $join3);
		$this->db->join($table5, $join4);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	
	function enamtable_limit($select, $table1, $table2, $table3, $table4, $table5, $table6,  $join1, $join2, $join3, $join4, $join5, $where, $nilai){
		$this->db->select($select);    
		$this->db->from($table1);
		$this->db->join($table2, $join1);
		$this->db->join($table3, $join2);
		$this->db->join($table4, $join3);
		$this->db->join($table5, $join4);
		$this->db->join($table6, $join5);
		$this->db->where($where);
		$this->db->limit($nilai);
		$query = $this->db->get();
		return $query->result();
	}

	function get_order_by($select, $table, $where, $kolom, $orderby, $nilai)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($kolom, $orderby);
		$this->db->limit($nilai);
		$query = $this->db->get();
		return $query->result();
	}

	function get_order_group_by($select, $table, $where, $group, $kolom, $orderby, $nilai)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->order_by($kolom, $orderby);
		$this->db->limit($nilai);
		$query = $this->db->get();
		return $query->result();
	}

	function get_group_by($select, $table, $where, $group)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_by($group);
		$query = $this->db->get();
		return $query->result();
	}

	function duatable_limit($select, $table1, $table2, $join, $where, $nilai)
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->join($table2, $join);
		$this->db->where($where);
		$this->db->limit($nilai);
		$query = $this->db->get();
		return $query->result();
	}
	function duatable_order_by($select, $table1, $table2, $join, $where, $kolom, $orderby)
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->join($table2, $join);
		$this->db->where($where);
		$this->db->order_by($kolom, $orderby);
		$query = $this->db->get();
		return $query->result();
	}

	function duatable_group_by($select, $table1, $table2, $join, $where, $group)
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->join($table2, $join);
		$this->db->where($where);
		$this->db->group_by($group);
		$query = $this->db->get();
		return $query->result();
	}
	function tigatable_rekap_operasional($table1, $table2, $table3, $join, $join2, $where, $group)
	{
		$this->db->select('id_rekap, tgl_berangkat, jam_berangkat, GROUP_CONCAT("<ul><li> ", nama SEPARATOR "</li></ul><br>") as nama, lokasi_tujuan, biaya');
		$this->db->from($table1);
		$this->db->join($table2, $join);
		$this->db->join($table3, $join2);
		$this->db->where($where);
		$this->db->group_by($group);
		$query = $this->db->get();
		return $query->result();
	}


}