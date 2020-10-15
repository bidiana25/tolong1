<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('user')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }

    public function update($data, $id)
{
    $this->db->where('id', $id);
    return $this->db->update('user', $data);
}

public function save($data, $id)
 {
    $this->db->where('id', $id);
    return $this->db->update('user', $data);
 }


 public function cek_old()
  {
   $old = $this->input->post('old');    $this->db->where('password',$old);
   $query = $this->db->get('user');
      return $query->result();;
          }

}
