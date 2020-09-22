<div class="card">
  <div class="card-header">
    <h5>Daftar Pemasukan</h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->
    <button data-toggle="modal" data-target="#addModal" class="btn btn-success waves-effect waves-light">Tambah Pemasukan</button>

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th>Kategori Pemasukam Pemasukan</th>
            <th>Keterangan</th>
            <th>Jenis Pemasukan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($C_Pemasukan as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->tanggal_pemasukan; ?></td>
            <td><?php echo rupiah($value->nominal_pemasukan); ?></td>
            <td><?php echo $value->kategori_pemasukan; ?></td>
            <td><?php echo $value->keterangan_pemasukan; ?></td>
            <td><?php echo $value->jenis_pemasukan; ?></td>
            <td>
               <!--Edit-->
               <a href="javascript:void(0);" 
                  data-toggle="modal" data-target="#Modal_Edit<?php echo $value->id_pemasukan;?>" 
                  class="btn-edit">
                  <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                </a> 

              <!--Hapus-->
              <a href="<?php echo site_url('C_Pemasukan/delete/' . $value->id_pemasukan) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>


          </tfoot>
      </table>

    </div>
  </div>
</div>




<!-- MODAL TAMBAH Beban! !-->
<form action="<?php echo base_url('C_Pemasukan/tambah') ?>" method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pemasukan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Tanggal Pemasukan</label>
            <input type="date" class="form-control" name="tanggal_pemasukan">
          </div>

          <div class="form-group">
            <label>Kategori Pemasukan</label>
                        <select class="form-control" name="kategori_pemasukan">
                        <optgroup label="Jenis Uang Masuk">
                        <option value="Uang Gedung">Uang Gedung</option>
                        <option value="Uang Baju">Uang Baju</option>
                        <option value="Uang Buku">Uang Buku</option>
                        <option value="Uang Tahunan">Uang Tahunan</option>
                        <option value="Uang SPP">Uang SPP</option>
                        <option value="Uang Eskul">Uang Eskul</option>
                        <option value="Uang Komite">Uang Komite</option>
                        <optgroup label="Jenis Infak">
                        <option value="Infak Pembangunan">Infak Pembangunan</option>
                        <option value="Infak Sekolah">Infak Sekolah</option>
                        <optgroup label="Jenis Tabungan">
                        <option value="Tabungan">Tabungan</option>
                        <optgroup label="Jenis Yang Lainnya">
                        <option value="Pemasukan Lainnya">Pemasukan Lainnya</option>
                    </select>
          </div>

          <div class="form-group">
            <label>Nominal Pemasukan</label>
            <input type="text" class="form-control" name="nominal_pemasukan" placeholder="Nominal Pemasukan">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan_pemasukan" placeholder="Keterangan Pemasukan">
          </div>

         <div class="form-group">
            <label>jenis Pemasukan</label>
                        <select class="form-control" name="jenis_pemasukan">
                        <option value="" disabled>Pilih Jenis Pemasukan</option>
                        <option value="Kas">Kas</option>
                        <option value="Bank">Bank</option>
                    </select>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- MODAL TAMBAH AKUN! SELESAI !-->

<!-- MODAL EDIT AKUN !-->
<?php
foreach($C_Pemasukan as $key => $value)
{
  ?>
  <div class="modal fade" id="Modal_Edit<?php echo $value->id_pemasukan;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url('C_Pemasukan/edit_action')?>" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Pemasukan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <h5>Edit Daftar Pemasukan</h5>

            <div class="form-group">
              <label></label>
              <input type="text" class="form-control" hidden="" name="id_pemasukan" value="<?=$value->id_pemasukan; ?>">
            </div>

          <div class="form-group">
            <label>Tanggal Pemasukan</label>
            <input type="date" class="form-control" name="tanggal_pemasukan" value="<?=$value->tanggal_pemasukan; ?>">
          </div>

          <div class="form-group">
            <label>Kategori Pemasukan</label>
                        <select class="form-control" name="kategori_pemasukan">
                        <option value="" disabled>Pilih Kategori Pemasukan</option>
                        <optgroup label="Jenis Uang Masuk">
                        <option value="Uang Gedung">Uang Gedung</option>
                        <option value="Uang Baju">Uang Baju</option>
                        <option value="Uang Buku">Uang Buku</option>
                        <option value="Uang Tahunan">Uang Tahunan</option>
                        <option value="Uang SPP">Uang SPP</option>
                        <option value="Uang Eskul">Uang Eskul</option>
                        <option value="Uang Komite">Uang Komite</option>
                        <optgroup label="Jenis Infak">
                        <option value="Infak Pembangunan">Infak Pembangunan</option>
                        <option value="Infak Sekolah">Infak Sekolah</option>
                        <optgroup label="Jenis Tabungan">
                        <option value="Tabungan">Tabungan</option>
                        <optgroup label="Jenis Yang Lainnya">
                        <option value="Pemasukan Lainnya">Pemasukan Lainnya</option>
                    </select>
          </div>

          <div class="form-group">
            <label>Nominal Pemasukan</label>
            <input type="text" class="form-control" name="nominal_pemasukan" value="<?=$value->nominal_pemasukan; ?>">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan_pemasukan" value="<?=$value->keterangan_pemasukan; ?>">
          </div>

         <div class="form-group">
            <label>jenis Pemasukan</label>
                        <select class="form-control" name="jenis_pemasukan">
                        <option value="" disabled>Pilih Jenis Pemasukan</option>
                        <option value="Kas">Kas</option>
                        <option value="Bank">Bank</option>
                    </select>
          </div>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?> 
<!-- MODAL EDIT AKUN! SELESAI !--> 



<!-- Untuk rupiah pemisah angka koma dan RP !-->
<?php

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
?>