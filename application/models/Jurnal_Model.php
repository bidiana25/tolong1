<?php
 class Jurnal_Model extends CI_Model{

 	public function select_jurnal(){
 	$this->db->select('*');
    $this->db->from('t_t_jurnal');   
   $akun = $this->db->get ();
    return $akun->result ();
 	}

 	public function select_by_id($id){
 		$this->db->where('id_kamar',$id);
 		return $this->db->get('tblkamar')->row();
 	}

 	function tambah($data){
		    $this->db->insert('t_m_akun2', $data);
		    return TRUE;
		}

 	public function delete($id){
		$this->db->where('id_akun2',$id);
		$this->db->delete('t_m_akun2');
		}

		public function update_akun($data,$id){
 		$this->db->where('id_akun2',$id);
 		return $this->db->update('t_m_akun2',$data);
 	}

 }
?>
