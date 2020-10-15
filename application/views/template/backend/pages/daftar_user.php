<div class="card">
  <div class="card-header">
    <h5>Edit User
    </h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->


<!-------------------------- LIST TABS VIEW NYA !--------------------------------------->
  <input id="tab1" type="radio" name="tabs" checked>
    <label for="tab1">Profile</label>
  <input id="tab2" type="radio" name="tabs">
    <label for="tab2">Password</label>
  <input id="tab3" type="radio" name="tabs">
    <label for="tab3">Foto Profile</label>

<!-------------------------- KONTEN PERTAMA !--------------------------------------->

  <section id="content1">
  	<form action="<?php echo base_url('Auth/updateProfile') ?>" method="post">

    <h3>Ubah Profile</h3>

    <div class="table-responsive dt-responsive">
      <div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama</label>
	<div class="col-sm-10">
		<input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama') ?>"></div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type="text" name="email" class="form-control" value="<?php echo $this->session->userdata('email') ?>"></div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Role</label>
	<div class="col-sm-10">
		<input type="text" name="role" class="form-control" value="<?php echo $this->session->userdata('role') ?>" disabled></div>
</div>


        <div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
        </div>

    </div>
</form>
  </section>

<!-------------------------- KONTEN KE DUA !--------------------------------------->


  <section id="content2">

<form class="form-horizontal" action="<?php echo base_url('auth/save_password') ?>" method="POST">
	<h3>Ubah Password</h3>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Password Lama</label>
	<div class="col-sm-10">
		<input type="password" name="old" value="<?php echo set_value('old');?>" class="form-control" placeholder="Password Lama" required></div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Password Baru</label>
	<div class="col-sm-10">
		<input type="password" name="new" value="<?php echo set_value('new');?>" class="form-control" placeholder="Password Baru" required></div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Konfirmasi Password</label>
	<div class="col-sm-10">
		<input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required class="form-control" placeholder="Konfirmasi Password" required></div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
	</div>
</div>
</form>
  </section>

<!-------------------------- KONTEN KE DUA !--------------------------------------->
  <section id="content3">
    
    <img class="media-object card-list-img"  style="width:125px; height:125px" src="<?= base_url('assets/images/'.$this->session->userdata('photo')); ?>">
    
<div class="form-group row">
  <label class="col-sm-2 col-form-label">Foto</label>
  <div class="col-sm-10">
    <input type="file" name="photo" required class="form-control" required></div>
</div>
    
  </section>



<!-- CSS UNTUK TABS NYA !-->
<style type="text/css">

@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #5B264E;
  font-family: "Open Sans", "Arial";
}
a{
  text-decoration: none;
  color: #000;
}
a:hover{
  color: #B7977B;
}
main {
  background: #FFF;
  width: 500px;
  margin: 50px auto;
  padding: 10px 30px 80px;
  box-shadow: 0 3px 5px rgba(0,0,0,0.2);
}
p {
  font-size: 13px;
}

/* Important code */
input, section {
  clear: both;
  padding-top: 10px;
  display: none;
}
label {
  font-weight: bold;
  font-size: 14px;
  display: block;
  float: left;
  padding: 10px 30px;
  border-top: 2px solid transparent;
  border-right: 1px solid transparent;
  border-left: 1px solid transparent;
  border-bottom: 1px solid #DDD;
}
label:hover {
  cursor: pointer;
  text-decoration: underline;
}
#tab1:checked ~ #content1, #tab2:checked ~ #content2, #tab3:checked ~ #content3, #tab4:checked ~ #content4 {
  display: block;
}
input:checked + label {
  border-top-color: #B7977B;
  border-right-color: #DDD;
  border-left-color: #DDD;
  border-bottom-color: transparent;
  text-decoration: none;
}
</style>