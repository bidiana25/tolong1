	<?php
	class Pemasukan_Model extends CI_Model
	{  

        //Untuk menampilkan jurnal Penerimaan kas
		public function select_pemasukan()
		{  
            $this->db->select ('*');
            $this->db->from('t_m_transaksi a');
            $this->db->join('t_t_jurnal b', 'a.id_transaksi=b.rid_transaksi');
            $this->db->join('t_m_akun2 c', 'b.rid_akun=c.id_akun2');
            $this->db->where("b.kredit",null);
            $this->db->where("a.jenis_transaksi","1");
            $pemasukan = $this->db->get();
            return $pemasukan->result();
		}
        //Untuk nampilkan pada halaman daftar penerimaan_kas
		public function select_penerimaan()
		{  
            
            $this->db->select ('*');
            $this->db->from('t_m_transaksi a');
            $this->db->join('t_t_jurnal b', 'a.id_transaksi=b.rid_transaksi');
            $this->db->join('t_m_akun2 c', 'b.rid_akun=c.id_akun2');
            $this->db->where("a.jenis_transaksi", "1");
            $this->db->where("b.kredit",null);
            $penerimaan = $this->db->get();
            return $penerimaan->result();
		}

	//untuk option value untuk dapat kas dan bank
		public function getKasBank()
		{
			$this->db->select('*');
			$this->db->from('t_m_akun2  b');
			$this->db->join('t_m_akun1 a', 'a.id_akun1=b.rid_akun1');
			$this->db->where("b.nama_akun2", "Kas");
			$this->db->or_where("b.nama_akun2", "Bank");
			$beban = $this->db->get();

			return $beban->result(); 
		}
		//untuk dapatin apa yang jadi pemasukannya (kredit)
		public function getPemasukans()
		{
			$this->db->select('*');
			$this->db->from('t_m_akun2  b');
			$this->db->join('t_m_akun1 a', 'a.id_akun1=b.rid_akun1');
			$this->db->where("b.rid_akun1", "7");
			$this->db->or_where("b.rid_akun1", "8");
			$this->db->or_where("b.rid_akun1", "1");
			$this->db->where("b.id_akun2", "82");
			$pemasukan = $this->db->get();

			return $pemasukan->result();
		}

        //Untuk inputkan data yang diinputkan pada daftar pemasukan
		function tambah1($data,$jurnal,$jurnal2)
		{
			$this->db->trans_start();

			$this->db->insert('t_m_transaksi', $data); 
    		$id_transaksi = $this->db->insert_id(); 

		    $jurnal['rid_transaksi'] = $id_transaksi;
		    $this->db->insert('t_t_jurnal', $jurnal);

            $jurnal2['rid_transaksi'] = $id_transaksi;
            $this->db->insert('t_t_jurnal', $jurnal2);

		    $this->db->trans_complete(); 

		    return $this->db->insert_id(); 

		}
        //Menghapus data pemasukan dan relasinya ke tabel t_t_jurnal
		public function delete($id)
		{
            $sql = "DELETE t_m_transaksi,t_t_jurnal 
        FROM t_m_transaksi,t_t_jurnal 
        WHERE t_m_transaksi.id_transaksi=t_t_jurnal.rid_transaksi 
        AND t_m_transaksi.id_transaksi= ?";

            $this->db->query($sql, array($id));
		}

        //Untuk edit ketiga data
		public function update_pemasukan($data, $id, $jurnal, $jurnal2)
		{
            $this->db->trans_start();

			$this->db->where('id_transaksi', $id);
			$this->db->update('t_m_transaksi', $data);

            $this->db->where('rid_transaksi', $id);
            $this->db->where('kredit', null);
            $this->db->update('t_t_jurnal', $jurnal);


            $this->db->where('rid_transaksi', $id);
            $this->db->where('debit', null);
            $this->db->update('t_t_jurnal', $jurnal2);

            $this->db->trans_complete(); 

		}

		//Untuk cek kode masuk
		public function cekkodemasuk()
		{
			$query = $this->db->query("SELECT MAX(kode_transaksi) as kode_pemasukan from t_m_transaksi");
			$hasil = $query->row();
			return $hasil->kode_pemasukan;
		}
	}

	?>
