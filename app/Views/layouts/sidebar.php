<?php

use Faker\Provider\Base;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Inventory</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="item-beranda">
        <a class="nav-link" href="<?= base_url('/beranda') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" id="item-manage-data">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="link-manage-data">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Data:</h6>
                <a class="collapse-item" href="<?= base_url('/karyawan') ?>">Karyawan</a>
                <a class="collapse-item" href="<?= base_url('/pemasok') ?>">Pemasok</a>
                <a class="collapse-item" href="<?= base_url('/konsumen') ?>">Konsumen</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/manajemenbarang') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manajemen Barang</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/stokmenipis') ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Stok Menipis</span></a>
    </li>

    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi:</h6>
                <a class="collapse-item" href="<?= base_url('/transaksimasuk') ?>">Barang Masuk</a>
                <a class="collapse-item" href="<?= base_url('/transaksikeluar') ?>">Barang Keluar</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan:</h6>
                <a class="collapse-item" href="<?= base_url('/laporanbarangmasuk') ?>">Barang Masuk</a>
                <a class="collapse-item" href="<?= base_url('/laporanbarangkeluar') ?>">Barang Keluar</a>
                <a class="collapse-item" href="<?= base_url('/laporankonsumen') ?>">Konsumen</a>
                <a class="collapse-item" href="<?= base_url('/laporanpemasok') ?>">Pemasok</a>
            </div>
        </div>
    </li>
    <?php if ($level == 'super_admin') : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/pengguna') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manajemen Pengguna</span></a>
        </li>

    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/Auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>