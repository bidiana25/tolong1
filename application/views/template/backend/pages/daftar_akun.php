<div class="card">
  <div class="card-header">
    <h5>Daftar Akun</h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->
    <button data-toggle="modal" data-target="#addModal" class="btn btn-success waves-effect waves-light">Tambah Akun</button>

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Tipe Akun</th>
            <th>Kategori Akun</th>
            <th>Keterangan</th>
            <th>Saldo</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $rid_akun1 = "1";
          $p = new Akun_Model;
          $C_Akun1 = $p->tampilAkun($rid_akun1);
          echo "<tr><td colspan='8'><b> 10000 - Aset" . "</b></td></tr>";
          foreach ($C_Akun1 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "3";
          $p = new Akun_Model;
          $C_Akun2 = $p->tampilAkun($rid_akun1);
          foreach ($C_Akun2 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "4";
          $p = new Akun_Model;
          $C_Akun3 = $p->tampilAkun($rid_akun1);
          foreach ($C_Akun3 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "5";
          $p = new Akun_Model;
          $C_Akun4 = $p->tampilAkun($rid_akun1);
          echo "<tr><td colspan='8'><b> 20000 - Kewajiban/Hutang" . "</b></td></tr>";
          foreach ($C_Akun4 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "6";
          $p = new Akun_Model;
          $C_Akun5 = $p->tampilAkun($rid_akun1);
          foreach ($C_Akun5 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "7";
          $p = new Akun_Model;
          $C_Akun6 = $p->tampilAkun($rid_akun1);
          echo "<tr><td colspan='8'><b> 30000 - Modal" . "</b></td></tr>";
          foreach ($C_Akun6 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "8";
          $p = new Akun_Model;
          $C_Akun7 = $p->tampilAkun($rid_akun1);
          echo "<tr><td colspan='8'><b> 40000 - Pendapatan" . "</b></td></tr>";
          foreach ($C_Akun7 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>

          <?php
          $rid_akun1 = "9";
          $p = new Akun_Model;
          $C_Akun8 = $p->tampilAkun($rid_akun1);
          echo "<tr><td colspan='8'><b> 50000 - Beban/Biaya" . "</b></td></tr>";
          foreach ($C_Akun8 as $key => $value) {
          ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->kode_akun2; ?></td>
            <td><?php echo $value->nama_akun2; ?></td>
            <td><?php echo $value->nama_akun1; ?></td>
            <td><?php echo $value->kategori_akun1; ?></td>
            <td><?php echo $value->ket; ?></td>
            <td><?php echo rupiah($value->saldo); ?></td>
            <td>
              <!--Edit-->
              <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Edit" class="btn-edit" data-id="<?= $value->id_akun2; ?>">
                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
              </a>

              <!--Hapus-->
              <a href="<?php echo site_url('C_Akun/delete/' . $value->id_akun2) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
            </td>


            </tr>
          <?php } ?>
          </tfoot>
      </table>

    </div>
  </div>
</div>




<!-- MODAL TAMBAH AKUN! !-->
<form action="<?php echo base_url('C_Akun/tambah') ?>" method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Akun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <h5>Tambah Daftar Akun</h5>

          <div class="form-group">
            <label>Nama Akun</label>
            <input type="text" class="form-control" name="nama_akun2" placeholder="Nama Akun">
          </div>

          <div class="form-group">
            <label>Kode Akun</label>
            <input type="text" class="form-control" name="kode_akun2" placeholder="Kode Akun">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="ket" placeholder="Keterangan">
          </div>

          <div class="form-group">
            <label>Tipe Akun</label>
            <select name="rid_akun1" class="form-control">
              <?php
              $rid_akun1 = $this->db->get('t_m_akun1');
              foreach ($rid_akun1->result() as $row) {

              ?>
                <option value="<?php echo $row->id_akun1; ?>"><?php echo $row->kode_akun1 . ' ' . '-' . ' ' . $row->nama_akun1; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Saldo</label>
            <input type="text" class="form-control" name="saldo" placeholder="Saldo">
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

$akun = array_merge($C_Akun1, $C_Akun2, $C_Akun3, $C_Akun4, $C_Akun5, $C_Akun6, $C_Akun7, $C_Akun8); ?>
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="<?php echo base_url('C_Akun/edit_action') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Akun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <h5>Edit Daftar Akun</h5>

          <div class="form-group">
            <label></label>
            <input type="text" class="form-control" hidden="" name="id_akun2" value="">
          </div>
          <div class="form-group">
            <label>Nama Akun</label>
            <input type="text" class="form-control" name="nama_akun2" value="">
          </div>

          <div class="form-group">
            <label>Kode Akun</label>
            <input type="text" class="form-control" name="kode_akun2" value="">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="ket" value="<?= $value->ket; ?>">
          </div>

          <div class="form-group">
            <label>Tipe Akun</label>
            <select name="rid_akun1" class="form-control" value="rid_akun1">
              <?php
              $rid_akun1 = $this->db->get('t_m_akun1');

              foreach ($rid_akun1->result() as $row) : ?>

                <option class="rid_akun" value="<?= $row->id_akun1; ?>"><?php echo $row->kode_akun1 . ' ' . '-' . ' ' . $row->nama_akun1; ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Saldo</label>
            <input type="text" class="form-control" name="saldo" value="">
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
<!-- MODAL EDIT AKUN! SELESAI !-->

<script>
  const akuns = <?= json_encode($akun) ?>;
  let elModalEdit = document.querySelector(".modal#Modal_Edit");
  let elBtnEdits = document.querySelectorAll(".btn-edit");
  [...elBtnEdits].forEach(edit => {
    edit.addEventListener("click", (e) => {
      let id = edit.getAttribute("data-id");
      console.log(id);
      let Akun = akuns.filter(akun => {
        if (akun.id_akun2 == id)
          return akun;
      });
      const {
        id_akun2,
        nama_akun2,
        kode_akun2,
        ket,
        rid_akun1,
        saldo
      } = Akun[0];
      console.log(elModalEdit);
      elModalEdit.querySelector("[name=id_akun2]").value = id_akun2;
      elModalEdit.querySelector("[name=nama_akun2]").value = nama_akun2;
      elModalEdit.querySelector("[name=kode_akun2]").value = kode_akun2;
      elModalEdit.querySelector("[name=ket]").value = ket;
      elModalEdit.querySelector("[name=saldo]").value = saldo;
      [...elModalEdit.querySelectorAll("option.rid_akun")].forEach(rid => {
        if (rid.getAttribute("value") == rid_akun1) {
          rid.setAttribute("selected", 'selected')
        }
      })



    })
  })
</script>



<?php

function rupiah($angka)
{

  $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}
?>