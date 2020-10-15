<div class="row">

<!-- UNTUK CARD PERTAMA !-->
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-red">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Saldo</h6>
<h3 class="m-b-0 f-w-700 text-white">$1,783</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
<p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
</div>
</div>
</div>


<!-- UNTUK CARD KEDUA !-->
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Transaksi Bulan Ini</h6>
<h3 class="m-b-0 f-w-700 text-white">15,830</h3>
</div>
<div class="col-auto">
<i class="fas fa-database text-c-blue f-18"></i>
</div>
</div>
<p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
</div>
</div>
</div>

<!-- UNTUK CARD KETIGA !-->
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Pemasukan Bulan Ini</h6>
<h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
</div>
<div class="col-auto">
<i class="fas fa-plus text-c-green f-18"></i>
</div>
</div>
<p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
</div>
</div>
</div>
<!-- UNTUK CARD KEEMPAT !-->
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-yellow">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Pengeluaran Bulan Ini</h6>
<h3 class="m-b-0 f-w-700 text-white">6,784</h3>
</div>
<div class="col-auto">
<i class="fas fa-minus text-c-yellow f-18"></i>
</div>
</div>
<p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
</div>
</div>
</div>

</div>


    <!-- KONTEN INFO !-->
<div class="card">
  <div class="card-header">
    <h5>Info</h5>
  </div>
  <div class="card-block">
<div class="card list-view-media">
<div class="card-block">
<div class="media">
<a class="media-left" href="#">
<img class="media-object card-list-img"  style="width:125px; height:125px" src="<?= base_url('assets/images/'.$this->session->userdata('photo')); ?>">
</a>
<div class="media-body">
<div class="col-xs-12">
<h6 class="d-inline-block">
 <?php echo $this->session->userdata('nama') ?>
<label class="label label-info"><?php echo $this->session->userdata('role') ?></label>
</div>
<div class="f-13 text-muted m-b-15">
 <?php echo $this->session->userdata('email') ?>
</div>

<?php
// Cek role user
if($this->session->userdata('role') == 'bendahara'){ // Jika role-nya admin
    ?>
   <p>Bendahara berwenang untuk merekam transaksi yang terjadi di Sekolah Insan Teladan Pekanbaru</p>
    <?php
}else{ // Jika role-nya operator
    ?>
  <p> Yayasan memantau alur keuangan dan transaksi yang terjadi di Sekolah Insan Teladan Pekanbaru </p>
    <?php
}
?>

</div>
</div>
</div>
</div>


    </div>
  </div>
