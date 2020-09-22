	<?php
 class Pemasukan_Model extends CI_Model{

  	public function select_pemasukan(){
 	$this->db->select('*');
    $this->db->from('tm_pemasukan');   
   $pemasukan = $this->db->get ();
    return $pemasukan->result ();
 	}

 	public function select_by_id($id){
 		$this->db->where('id_kamar',$id);
 		return $this->db->get('tblkamar')->row();
 	}

 	function tambah($data){
		    $this->db->insert('tm_pemasukan', $data);
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



 }
 
?>
