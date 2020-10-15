<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_JurKelkas extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Pengeluaran_model');
  }

  public function index()
  {
    $data = [
      "pengeluaran_kas" => $this->Pengeluaran_model->select_pengeluaran(),
      "title" => "Jurnal Pengeluaran Kas",
      "description" => "Jurnal Pengeluaran Kas"
    ];

    $this->render_backend('template/backend/pages/Jurnal_Pengeluaran', $data);
  }

} 
