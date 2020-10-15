<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Jum extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('JurnalUmum_Model');
  }

  public function index()
  {
    $data = [
      "data_jurnal" => $this->JurnalUmum_Model->select_data(),
      "title" => "Jurnal Jurnal Umum",
      "description" => "Jurnal Umum"
    ];

    $this->render_backend('template/backend/pages/Jurnal_Umum', $data);
  }

}
