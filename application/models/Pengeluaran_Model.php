	<?php
 class Pengeluaran_Model extends CI_Model{

  	public function select_pengeluaran(){
 	$this->db->select('*');
    $this->db->from('jurnal_kk a'); 
    $this->db->join('t_m_akun2 b', 'a.jurnalkk_rid=b.id_akun2');    
   $akun = $this->db->get ();
    return $akun->result ();
 	}

 	public function select_by_id($id){
 		$this->db->where('id_kamar',$id);
 		return $this->db->get('tblkamar')->row();
 	}

 	function tambah($data){
		    $this->db->insert('jurnal_kk', $jkk);
		    return TRUE;
		}

 	public function delete($id){
		$this->db->where('id_pemasukan',$id);
		$this->db->delete('tm_pemasukan');
		}

		public function update_pemasukan($data,$id){
 		$this->db->where('id_pemasukan',$id);
 		return $this->db->update('tm_pemasukan',$data);
 	}


// Untuk sum semua nilai uang
 	public function get_sum_beban(){
	$sql = "SELECT sum(debit_beban) as beban from jurnal_kk";
	$result = $this->db->query($sql);
	return $result->row()->beban;
	}

 	public function get_sum_perlengkapan(){
	$sql = "SELECT sum(debit_perlengkapan) as perlengkapan from jurnal_kk";
	$result = $this->db->query($sql);
	return $result->row()->perlengkapan;
	}

 	public function get_sum_hutang(){
	$sql = "SELECT sum(debit_hutang) as hutang from jurnal_kk";
	$result = $this->db->query($sql);
	return $result->row()->hutang;
	}

	 public function get_sum_kas(){
	$sql = "SELECT sum(kreditkas) as kreditkas from jurnal_kk";
	$result = $this->db->query($sql);
	return $result->row()->kreditkas;
	}



 }
 
?>
