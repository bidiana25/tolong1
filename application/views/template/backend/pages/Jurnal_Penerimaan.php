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
            <th colspan="3" style="font-size: 13px">
              <center>Kredit</center>
            </th>
          <tr>
            <th style="font-size: 13px;text-align: center;">Kas</th>
            <th style="font-size: 13px;text-align: center;">Bank</th>
            <!-- <th style="font-size: 13px;text-align: center;">HPP</th> -->

            <th style="font-size: 13px;text-align: center;">Piutang</th>
            <th style="font-size: 13px;text-align: center;">Modal</th>
            <!-- <th style="font-size: 13px;text-align: center;">Persediaan</th> -->
            <!-- <th style="font-size: 13px;text-align: center;">Persediaan</th> -->
          </tr>
          </tr>
        </thead>

        <tbody>
          <?php
          $totalA = 0;
          $totalB = 0;
          $totalC = 0;
          foreach ($pemasukan_kas as $key => $value) {
          ?>

            <tr class="odd gradeX">
              <td style="font-size: 13px"> <?php echo ($value->tanggal_pemasukan) ?> </td>
              <td style="font-size: 13px"> <?php echo ($value->kode_pemasukan) ?> </td>
              <td style="font-size: 13px"> <?php echo ($value->nama_akun2) ?> </td>

              <td style="font-size: 13px"> <?php echo rupiah($value->nominal_pemasukan); ?> </td>

              <td style="font-size: 13px"> <?php if ($value->rid_akun1 == 8) {
                                              $totalA += $value->nominal_pemasukan;
                                              echo rupiah($value->nominal_pemasukan);
                                            } ?> </td>
              <td style="font-size: 13px"> <?php if ($value->rid_akun1 == 3 ) {
                                              $totalB += $value->nominal_pemasukan;
                                              echo rupiah($value->nominal_pemasukan);
                                            } ?> </td>
              <td style="font-size: 13px"> <?php if ($value->rid_akun1 == 7) {
                                              $totalC += $value->nominal_pemasukan;
                                              echo rupiah($value->nominal_pemasukan);
                                            } ?> </td>
              
            </tr>


        </tbody>
      <?php } ?>
      <tfoot>
        <!-- UNTUK JUMLAH -->

        <tr>
          <th colspan="3" style="text-align:right">Total:</th>
          <!-- SUM BEBAN -->
          <th style="text-align:right"> <?php echo rupiah($totalA+ $totalB + $totalC); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalA); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalB); ?> </th>
          <th style="text-align:right"> <?php echo rupiah($totalC); ?> </th>
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