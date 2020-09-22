	<?php
 class Beban_Model extends CI_Model{

  	public function select_beban(){
 	$this->db->select('*');
    $this->db->from('tm_beban a');   
    $this->db->join('t_m_akun2 b', 'a.rid_akun=b.id_akun2');  
   $beban = $this->db->get ();
    return $beban->result ();
 	}

 	public function select_by_id($id){
 		$this->db->where('id_kamar',$id);
 		return $this->db->get('tblkamar')->row();
 	}

 	function tambah1($data){
		    $this->db->insert('tm_beban', $data);
		    return TRUE;
		}

 	function tambah2($jkk){
		    $this->db->insert('jurnal_kk', $jkk);
		    return TRUE;
		}

 	public function delete($id){
		$this->db->where('id_beban',$id);
		$this->db->delete('tm_beban');
		}

		public function update_beban($data,$id){
 		$this->db->where('id_beban',$id);
 		return $this->db->update('tm_beban',$data);
 	}

 	    public function cekkodebeban()
    {
        $query = $this->db->query("SELECT MAX(kode_beban) as kode_beban from tm_beban");
        $hasil = $query->row();
        return $hasil->kode_beban;
    }



 }
 
?>
