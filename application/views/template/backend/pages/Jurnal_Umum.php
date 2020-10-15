<div class="card">
  <div class="card-header">
    <h5>Jurnal Umum</h5>
  </div>
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->

<div align="right">
        </div><br />
      
 
  <div class="card-block table-border-style">
    <div class="table-responsive">
                    <table  class="table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal Transaksi</th>
                                <th colspan="2">Keterangan</th>
                                <th>Debet</th>
                                <th>Kredit</th> 
                            </tr>
                            
                        </thead>
                        <tbody>
                            <?php
                            $no=1;

                            foreach ($data_jurnal as $r)
                            {

                                ?>
                                
                            <tr bgcolor='#FFEBCD'>
                              <th scope="row"><?php echo ($no++); ?></th>
                              <td><strong><?php echo $r->kode_transaksi;?></strong></td>
                              <td><strong><?php echo $r->tanggal_transaksi;?></strong></td>
                              <td colspan="2"><strong><?php echo $r->ket_transaksi;?></strong></td>
                              <td align="center">&nbsp;</td>
                              <td align="center">&nbsp;</td>
                            </tr>

                            <?php
                //$this->load->model('transaksimodel');
                              $ayam=$this->db->query('SELECT t_t_jurnal.*,nama_akun2 FROM t_t_jurnal LEFT JOIN t_m_akun2 ON rid_akun=id_akun2 WHERE rid_transaksi='.$r->id_transaksi);
                foreach ($ayam->result_array() as $r2 )
                  {
              ?>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $r2['nama_akun2'];?></td>
                                  <td align="right"><?php echo number_format($r2['debit'],0,",",".");?></td>
                                  <td align="right"><?php echo number_format($r2['kredit'],0,",",".");?></td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                 <?php
                  }
                            }
                            ?>
                        </tbody>
                    </table>
                  </div>
                  </div>

  </div>
</div>




<?php

function rupiah($angka)
{

  $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}
?>