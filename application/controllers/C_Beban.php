<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Beban extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->param = array();


    $this->load->model('Pengeluaran_model');
  }

  public function index()
  { 
    $dariDB = $this->Pengeluaran_model->cekkodebeban();
    // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
    $nourut = substr($dariDB, 3, 4);
    $kodeBebanSekarang = $nourut + 1;


    $this->db->select('*,(SELECT rid_akun from t_t_jurnal where a.id_transaksi=rid_transaksi AND debit IS NULL) as rid_kredit');
    $this->db->from('t_m_transaksi a');
    $this->db->join('t_t_jurnal b', 'a.id_transaksi=b.rid_transaksi');
    $this->db->join('t_m_akun2 c', 'b.rid_akun=c.id_akun2');
    $this->db->where("a.jenis_transaksi", "2");
    $this->db->where("b.kredit", null);
    $C_Beban = $this->db->get()->result();

    // die(var_dump($C_Beban));

    $data = [
      "C_Beban" => $C_Beban,
      "bebans" => $this->Pengeluaran_model->getBebans(),
      "kasbank" => $this->Pengeluaran_model->getKasBank(),
      "title" => "Daftar Beban/Biaya",
      "description" => "Daftar Beban/Biaya",
      'kode_beban' => $kodeBebanSekarang,

    ];
    $this->render_backend('template/backend/pages/daftar_beban', $data);
  }

  public function delete($id)
  {
    $this->Pengeluaran_model->delete($id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Beban Berhasil Dihapus!</p></div>');
    redirect('/C_Beban');
  }

  function tambah()
  {

    $data = array(
      'id_transaksi' => $this->input->post("id_transaksi"),
      'tanggal_transaksi' => $this->input->post("tanggal_transaksi"),
      'ket_transaksi' => $this->input->post("ket_transaksi"),
      'kode_transaksi' => $this->input->post("kode_transaksi"),
      'jenis_transaksi' => $this->input->post("jenis_transaksi")
    );

    $jurnal = array(
      'id_jurnal' => $this->input->post("id_jurnal"),
      'rid_akun' => $this->input->post("rid_akun_debit"),
      'rid_transaksi' => $this->input->post("id_transaksi"),
      'debit' => $this->input->post("debit")
    );

    $jurnal2 = array(
      'id_jurnal' => $this->input->post("id_jurnal"),
      'rid_akun' => $this->input->post("rid_akun_kredit"),
      'rid_transaksi' => $this->input->post("id_transaksi"),
      'kredit' => $this->input->post("debit")
    );

    //model beban
    $this->Pengeluaran_model->tambah1($data, $jurnal, $jurnal2);
    //model jurnal keluar kas

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Beban Berhasil Ditambahkan!</strong></p></div>');
    redirect('C_Beban');
  }

  public function edit_action()
  {
    $id = $this->input->post("id_transaksi");

    $data = array(
      'tanggal_transaksi' => $this->input->post("tanggal_transaksi"),
      'ket_transaksi' => $this->input->post("ket_transaksi"),
      'kode_transaksi' => $this->input->post("kode_transaksi")
    );

    $jurnal = array(
      'rid_akun' => $this->input->post("rid_akun_debit"),
      'rid_transaksi' => $this->input->post("id_transaksi"),
      'debit' => $this->input->post("debit")
    );

    $jurnal2 = array(
      'rid_akun' => $this->input->post("rid_akun_kredit"),
      'rid_transaksi' => $this->input->post("id_transaksi"),
      'kredit' => $this->input->post("debit")
    );

    $this->Pengeluaran_model->update_beban($data, $id, $jurnal, $jurnal2);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Beban Berhasil Diupdate!</strong></p></div>');
    redirect('/C_Beban');
  }
}
