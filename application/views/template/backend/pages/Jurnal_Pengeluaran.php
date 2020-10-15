<div class="card">
  <div class="card-header">
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th rowspan="2" style="text-align: center; font-size: 13px;">Tanggal</th>
            <th rowspan="2" style="text-align: center; font-size: 13px;">Kode Transaksi</th>
            <th rowspan="2" style="text-align: center; font-size: 13px;">Keterangan</th>
            <th colspan="2" style="font-size: 13px">
              <center>Debit</center>
            </th>
            <th colspan="2" style="font-size: 13px">
              <center>Kredit</center>
            </th>
          <tr>
            <th style="font-size: 13px;text-align: center;">Beban</th>
            <th style="font-size: 13px;text-align: center;">Hutang Usaha</th>
            <!-- <th style="font-size: 13px;text-align: center;">HPP</th> -->

            <th style="font-size: 13px;text-align: center;">Kas</th>
            <th style="font-size: 13px;text-align: center;">Bank</th>
            <!-- <th style="font-size: 13px;text-align: center;">Persediaan</th> -->
            <!-- <th style="font-size: 13px;text-align: center;">Persediaan</th> -->
          </tr>
          </tr>
        </thead>

        <tbody>
          <?php
          $totalBeban = 0;
          $totalHutan = 0;
          $totalKas = 0;
          $totalBank = 0;
          foreach ($pengeluaran_kas as $key => $value) {
          ?>

            <tr class="odd gradeX">
              <td style="font-size: 13px"> <?php echo ($value->tanggal_transaksi) ?> </td>
              <td style="font-size: 13px"> <?php echo ($value->kode_transaksi) ?> </td>
              <td style="font-size: 13px"> <?php echo ($value->nama_akun2) ?> </td>

              <!-- Untuk Segala Macam Beban !-->
              <td style="font-size: 13px"> <?php if ($value->rid_akun1 == 9) {
                                              $totalBeban += $value->debit;
                                              echo rupiah($value->debit);
                                            } ?> </td>

            <!-- Untuk Segala Macam Hutang !-->
             <td style="font-size: 13px"> <?php if ($value->rid_akun1 == 6 || $value->rid_akun1 == 5) {
                                              $totalHutan += $value->debit;
                                              echo rupiah($value->debit);
                                            } ?> </td>
              <!-- Untuk KAS !-->
              <td style="font-size: 13px"> <?php if ($value->id_akun2 == 80) {
                                              $totalKas += $value->kredit;
                                              echo rupiah($value->kredit);
                                            } ?> </td>
              <!-- Untuk BANK !-->
              <td style="font-size: 13px"> <?php echo rupiah($value->debit); ?> </td>
            </tr>


        </tbody>
      <?php } ?>
      <tfoot>
        <!-- UNTUK JUMLAH -->

        <tr>
          <th colspan="3" style="text-align:right">Total:</th>
          <!-- SUM BEBAN -->
          <th style="text-align:right"> <?php echo rupiah($totalBeban); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalHutan); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalHutan + $totalBeban); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalHutan + $totalBeban); ?> </th>
        </tr>

      </tfoot>
      </table>

    </div>
  </div>
</div>



<!-- Untuk rupiah pemisah angka koma dan RP !-->
<?php

function rupiah($angka)
{

  $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}
?>