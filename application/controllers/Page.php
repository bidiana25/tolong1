<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function home(){
		$data = [
			
			"title" => "Dashboard SIA",
			"description" => "Sistem Informasi Akuntansi"
		  ];
		// function render_backend tersebut dari file core/MY_Controller.php
		$this->render_backend('home',$data); // load view home.php
	}

}

