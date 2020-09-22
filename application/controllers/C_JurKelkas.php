<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_JurKelkas extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Pengeluaran_Model');
  }

  public function index()
  {
    $data = [
      "C_JurKelkas" => $this->Pengeluaran_Model->select_pengeluaran(),
      "title" => "Jurnal Pengeluaran Kas",
      "description" => "Jurnal Pengeluaran Kas"
    ];
    $data['sum_beban'] = $this->Pengeluaran_Model->get_sum_beban();
    $data['sum_perlengkapan'] = $this->Pengeluaran_Model->get_sum_perlengkapan();
    $data['sum_hutang'] = $this->Pengeluaran_Model->get_sum_hutang();
    $data['sum_kas'] = $this->Pengeluaran_Model->get_sum_kas();
    $this->render_backend('template/backend/pages/Jurnal_Pengeluaran', $data);
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
    $beban_serba = $this->input->post("beban_serba");
    $beban_nominal = $this->input->post("beban_nominal");
    $beban_ket = $this->input->post("beban_ket");

    $data = array(
      'beban_tanggal' => $beban_tanggal,
      'beban_serba' => $beban_serba,
      'beban_nominal' => $beban_nominal,
      'beban_ket' => $beban_ket
    );

    $this->Beban_Model->tambah($data);

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
