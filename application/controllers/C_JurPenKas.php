<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_JurPenKas extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Pemasukan_Model');
  }

  public function index()
  {
    $data = [
      "pemasukan_kas" => $this->Pemasukan_Model->select_pemasukan(),
      "title" => "Jurnal Pemasukan Kas",
      "description" => "Jurnal Pemasukan Kas"
    ];
    $this->render_backend('template/backend/pages/Jurnal_Penerimaan', $data);
  }

}
