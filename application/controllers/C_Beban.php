<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Beban extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Beban_Model');
  }

  public function index()
  {
    $dariDB = $this->Beban_Model->cekkodebeban();
    // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeBebanSekarang = $nourut + 1;

    $data = [
      "C_Beban" => $this->Beban_Model->select_beban(),
      "title" => "Daftar Beban/Biaya",
      "description" => "Daftar Beban/Biaya",
      'kode_beban' => $kodeBebanSekarang
    ];
    $this->render_backend('template/backend/pages/daftar_beban', $data);
  }


    





















  public function delete($id)
  {
    $this->Beban_Model->delete($id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Beban Berhasil Dihapus!</p></div>');
    redirect('/C_Beban');
  }


  function tambah()
  {
    $beban_tanggal = $this->input->post("beban_tanggal");
    $rid_akun = $this->input->post("rid_akun");
    $beban_nominal = $this->input->post("beban_nominal");
    $beban_ket = $this->input->post("beban_ket");
    $kode_beban = $this->input->post("kode_beban");

    $data = array(
      'beban_tanggal' => $beban_tanggal,
      'rid_akun' => $rid_akun,
      'beban_nominal' => $beban_nominal,
      'beban_ket' => $beban_ket,
      'kode_beban' => $kode_beban
    ); 

    //untuk di jurnalkk(keluar kas)
    $jurnalkk_tanggal = $this->input->post("beban_tanggal");
    $jurnalkk_rid = $this->input->post("rid_akun");
    $debit_beban = $this->input->post("beban_nominal");
    $kreditkas = $this->input->post("beban_nominal");
    $kode_transaksi = $this->input->post("kode_beban");

    $jkk = array(
      'jurnalkk_tanggal' => $beban_tanggal,
      'jurnalkk_rid' => $rid_akun,
      'debit_beban' => $beban_nominal,
      'kreditkas' => $beban_nominal,
      'kode_transaksi' => $kode_beban
    ); 

    //model beban
    $this->Beban_Model->tambah1($data);
    //model jurnal keluar kas
     $this->Beban_Model->tambah2($jkk);

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Beban Berhasil Ditambahkan!</strong></p></div>');
    redirect('C_Beban');
  }

  public function edit_action()
  {
    $id = $this->input->post("id_beban");
    $beban_tanggal = $this->input->post("beban_tanggal");
    $beban_serba = $this->input->post("beban_serba");
    $beban_nominal = $this->input->post("beban_nominal");
    $beban_ket = $this->input->post("beban_ket");
    $data = array(
      'beban_tanggal' => $beban_tanggal,
      'beban_serba' => $beban_serba,
      'beban_nominal' => $beban_nominal,
      'beban_ket' => $beban_ket
    );
    $this->Beban_Model->update_beban($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Beban Berhasil Diupdate!</strong></p></div>');
    redirect('/C_Beban');
  }
}
