<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('UserModel');
	}

	public function index(){
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
			redirect('page/home'); // Redirect ke page home

		// function render_login tersebut dari file core/MY_Controller.php
		$this->render_login('login'); // Load view login.php
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		$user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('auth'); // Redirect ke halaman login
		}else{
			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'nama'=>$user->nama, // Buat session nama
                    'id'=>$user->id, // Buat session nama
                    'email'=>$user->email, // Buat session nama
                    'password'=>$user->password, // Buat session nama
                    'photo'=>$user->photo, // Buat session nama
					'role'=>$user->role // Buat session role
				);

				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('page/home'); // Redirect ke halaman home
			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('auth'); // Redirect ke halaman login
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth'); // Redirect ke halaman login
	}

//Untuk Update info dia
	public function profile()
{
	   $data = [
      "title" => "Edit Profile",
      "description" => "Edit Profile"
    ];
    $this->render_backend('template/backend/pages/daftar_user',$data);
}

public function updateProfile()
{

    $id = $this->session->userdata('id');
    $nama = $this->input->post("nama");
    $email = $this->input->post("email");
    $data = array(
      'nama' => $nama,
      'email' => $email
    );
    $this->UserModel->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Profile Berhasil Diupdate! Silahkan Relogin Kembali Untuk Melihat Perubahan</strong></p></div>');
    redirect('/Auth/profile');
}

public function save_password()
 { 
  $this->form_validation->set_rules('new','New','required|alpha_numeric');
  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
  $id = $this->session->userdata('id');

    if($this->form_validation->run() == FALSE)
  {
          $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p>Password Baru dan Konfirmasi Password harus sama!</p></div>');
        redirect('auth/profile');
  }else{
   $cek_old = $this->UserModel->cek_old();
   if ($cek_old == False){
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p> Password lama tidak sama!</p></div>');
    redirect('auth/profile');
   }else{
    $data = ['password' => $this->input->post('new')];
    $this->UserModel->save($data, $id);
    $this->session->sess_destroy();
    $this->session->set_flashdata('message','Password berhasil diubah, silahkan login kembali!');
redirect('auth');
   }//end if valid_user
  }
 }


     private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }


}
