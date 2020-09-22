<div class="card">
  <div class="card-header">
    <h5>Daftar Biaya/Beban</h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->
    <button data-toggle="modal" data-target="#addModal" class="btn btn-success waves-effect waves-light">Tambah Beban</button>

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Beban</th>
            <th>Tanggal</th>
            <th>Jenis Beban</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($C_Beban as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_beban; ?></td>
            <td><?php echo $value->beban_tanggal; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo rupiah($value->beban_nominal); ?></td>
            <td><?php echo $value->beban_ket; ?></td>
            <td>
               <!--Edit-->
               <a href="javascript:void(0);" 
                  data-toggle="modal" data-target="#Modal_Edit<?php echo $value->id_beban;?>" 
                  class="btn-edit">
                  <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                </a> 

              <!--Hapus-->
              <a href="<?php echo site_url('C_Beban/delete/' . $value->id_beban) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>


          </tfoot>
      </table>

    </div>
  </div>
</div>




<!-- MODAL TAMBAH Beban! !-->
<form action="<?php echo base_url('C_Beban/tambah') ?>" method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Beban</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Tanggal Beban</label>
            <input type="date" class="form-control" name="beban_tanggal">
          </div>

         <div class="form-group">
            <label>Kode Beban</label>
            <input type="text" class="form-control" id="kode_beban" name="kode_beban" value="BB<?php echo sprintf("%04s", $kode_beban) ?>" readonly>
          </div>

            <div class="form-group">
              <label>Jenis Beban</label>
              <select name="rid_akun" class="form-control" value="rid_akun">
                <?php 
                $rid_akun = $this->db->get('t_m_akun2');
                foreach ($rid_akun->result() as $row ) {

                 ?>
                 <option <?php if($row->id_akun2 == $value->rid_akun){ echo 'selected="selected"';} ?> value="<?=$row->id_akun2; ?>"><?php echo $row->kode_akun2.' '.'-'.' '.$row->nama_akun2;?></option>
               <?php }?>
             </select>
           </div>

          <div class="form-group">
            <label>Nominal Beban</label>
            <input type="text" class="form-control" name="beban_nominal" placeholder="Nominal Beban">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="beban_ket" placeholder="Keterangan">
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
foreach($C_Beban as $key => $value)
{
  ?>
  <div class="modal fade" id="Modal_Edit<?php echo $value->id_beban;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url('C_Beban/edit_action')?>" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Beban</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <h5>Edit Daftar Beban</h5>

            <div class="form-group">
              <label></label>
              <input type="text" class="form-control" hidden="" name="id_beban" value="<?=$value->id_beban; ?>">
            </div>

          <div class="form-group">
            <label>Tanggal Beban</label>
            <input type="date" class="form-control" name="beban_tanggal" value="<?=$value->beban_tanggal; ?>">
          </div>

            <div class="form-group">
              <label>Jenis Beban</label>
              <select name="beban_serba" class="form-control" value="beban_serba">
                        <optgroup label="Beban Gaji">
                                          <?php 
                $id_beban = $this->db->get('tm_beban');
                foreach ($id_beban->result() as $row ) {

                 ?>
                 <option <?php if($row->beban_serba == $value->beban_serba){ echo 'selected="selected"'; } ?> 
                 value="<?=$row->beban_serba; ?>"><?php echo $row->beban_serba;?></option>
               
                        <option value="Beban Gaji Guru">Beban Gaji Guru</option>
                        <option value="Beban Gaji Karyawan Lainnya">Beban Gaji Karyawan Lainnya</option>
                        <optgroup label="Bonus Dan Tunjangan">
                        <option value="THR Guru">THR Guru</option>
                        <option value="THR Karyawan Lainnya">THR Karyawan Lainnya</option>
                        <option value="Bonus Guru">Bonus Guru</option>
                        <option value="Bonus Karyawan Lainnya">Bonus Karyawan Lainnya</option>
                        <option value="Bonus Tour">Bonus Tour</option>
                        <optgroup label="Beban Eskul">
                        <option value="Gaji Pelatih">Gaji Pelatih</option>
                        <option value="Perlengkapan Eskul">Perlengkapan Eskul</option>
                        <optgroup label="Beban Operasional">
                        <option value="Beban Listrik">Beban Listrik</option>
                        <option value="Beban Penyusutan Peralatan">Beban Penyusutan Peralatan</option>
                        <option value="Beban Sewa">Beban Sewa</option>
                        <option value="Beban Kendaraan">Beban Kendaraan</option>
                        <option value="Beban Internet">Beban Internet/Pulsa</option>
                        <option value="Prive">Prive</option>
                        <optgroup label="Beban Lainnya">
                        <option value="Beban Pelatihan">Beban Pelatihan/Workshop</option>
                        <option value="Beban Kegiatan Anak">Beban Kegiatan Anak</option>
                        <option value="Beban Kegiatan OrangTua">Beban Kegiatan OrangTua</option>
                        <option value="Beban Rapor">Beban Rapor</option>
                        <option value="Beban Barang Inventaris">Beban Barang Inventaris</option>
                        <option value="Beban Gedung">Beban Gedung</option>
                        <option value="Beban Operasional Lainnya">Beban Operasional Lainnya</option>
                        <?php }?>
                    </select>
           </div>

          <div class="form-group">
            <label>Nominal Beban</label>
            <input type="text" class="form-control" name="beban_nominal" value="<?=$value->beban_nominal; ?>">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="beban_ket" value="<?=$value->beban_ket; ?>">
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