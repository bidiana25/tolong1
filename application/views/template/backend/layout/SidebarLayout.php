<div class="pcoded-navigation-label">Navigation</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="<?= base_url("page/home"); ?>" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Beranda</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("c_akun"); ?>" class="waves-effect waves-dark submenu">
                    <span class="pcoded-mtext">Daftar Akun</span>
                </a>
        </li>
            <li class="">
                <a href="<?= base_url("c_pemasukan"); ?>" class="waves-effect waves-dark submenu">
                    <span class="pcoded-mtext">Penerimaan Kas</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("c_beban"); ?>" class="waves-effect waves-dark submenu">
                    <span class="pcoded-mtext">Pengeluaran Kas/Beban</span>
                </a>
            </li>
        </ul>
    </li>

    <!-- Menu ke dua -->
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-list"></i></span>
            <span class="pcoded-mtext">Jurnal</span>
        </a>
        <ul class="pcoded-submenu">
        <li class="">
                <a href="<?= base_url("c_jurpenkas"); ?>" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Jurnal Penerimaan Kas</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url("c_jurkelkas"); ?>" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Jurnal Pengeluaran Kas</span>
                </a>
            </li>

        </ul>
    </li>

        <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
            <span class="pcoded-mtext">Laporan Keuangan</span>
        </a>
        <ul class="pcoded-submenu">
        <li class="">
                <a href="<?= base_url("c_jum"); ?>" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Jurnal Umum</span>
                </a>
            </li>
        <li class="">
                <a href="belum.html" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Laba Rugi</span>
                </a>
            </li>
            <li class="">
                <a href="belum.html" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Perubahan Modal</span>
                </a>
            </li>
            <li class="">
                <a href="belum.html" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Neraca</span>
                </a>
            </li>
            <li class="">
                <a href="belum.html" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Jurnal Penutup</span>
                </a>
            </li>
            <li class="">
                <a href="belum.html" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">Arus Kas</span>
                </a>
            </li>
            <!-- Bisa isi lagi disini -->
        </ul>

        <!-- Diluar Grouping disini -->
        <li class="">
        <a href="belum.html" class="sendirian waves-effect waves-dark">
        <span class="pcoded-micon">
        <i class="feather icon-credit-card"></i>
        </span>
        <span class="pcoded-mtext">Buku Besar</span>
        </a>
        </li>

        <li <?php if($this->uri->segment(2)=="profile"){echo 'class="active"';}?>>
        <a href="<?php echo base_url() ?>auth/profile/<?php echo $this->session->userdata('id'); ?>" class="waves-effect waves-dark">
        <span class="pcoded-micon">
        <i class="feather icon-settings"></i>
        </span>
        <span class="pcoded-mtext">Info User</span>
        </a>
        </li>

    </li>


</ul>