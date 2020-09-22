<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Pemasukan extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Pemasukan_Model');
  }

  public function index()
  {
    $data = [
      "C_Pemasukan" => $this->Pemasukan_Model->select_pemasukan(),
      "title" => "Daftar Pemasukan",
      "description" => "Daftar Pemasukan"
    ];
    $this->render_backend('template/backend/pages/daftar_pemasukan', $data);
  }


    





















  public function delete($id)
  {
    $this->Pemasukan_Model->delete($id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Pemasukan Berhasil Dihapus!</p></div>');
    redirect('/C_Pemasukan');
  }


  function tambah()
  {
    $tanggal_pemasukan = $this->input->post("tanggal_pemasukan");
    $nominal_pemasukan = $this->input->post("nominal_pemasukan");
    $kategori_pemasukan = $this->input->post("kategori_pemasukan");
    $keterangan_pemasukan = $this->input->post("keterangan_pemasukan");
    $jenis_pemasukan = $this->input->post("jenis_pemasukan");

    $data = array(
      'tanggal_pemasukan' => $tanggal_pemasukan,
      'nominal_pemasukan' => $nominal_pemasukan,
      'kategori_pemasukan' => $kategori_pemasukan,
      'keterangan_pemasukan' => $keterangan_pemasukan,
      'jenis_pemasukan' => $jenis_pemasukan
    );

    $this->Pemasukan_Model->tambah($data);

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Pemasukan Berhasil Ditambahkan!</strong></p></div>');
    redirect('C_Pemasukan');
  }

  public function edit_action()
  {
    $id = $this->input->post("id_pemasukan");
    $tanggal_pemasukan = $this->input->post("tanggal_pemasukan");
    $nominal_pemasukan = $this->input->post("nominal_pemasukan");
    $kategori_pemasukan = $this->input->post("kategori_pemasukan");
    $keterangan_pemasukan = $this->input->post("keterangan_pemasukan");
    $jenis_pemasukan = $this->input->post("jenis_pemasukan");
    $data = array(
      'tanggal_pemasukan' => $tanggal_pemasukan,
      'nominal_pemasukan' => $nominal_pemasukan,
      'kategori_pemasukan' => $kategori_pemasukan,
      'keterangan_pemasukan' => $keterangan_pemasukan,
      'jenis_pemasukan' => $jenis_pemasukan
    );
    $this->Pemasukan_Model->update_pemasukan($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Pemasukan Berhasil Diupdate!</strong></p></div>');
    redirect('/C_Pemasukan');
  }
}
