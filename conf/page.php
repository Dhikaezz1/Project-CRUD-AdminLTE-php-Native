<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'data_mahasiswa':
      include 'pages/mahasiswa/data_mahasiswa.php';
      break;

    case 'tambah_mahasiswa':
      include 'pages/mahasiswa/tambah_mahasiswa.php';
      break;

    case 'ubah_mahasiswa';
      include 'pages/mahasiswa/ubah_mahasiswa.php';
      break;

    case 'data_barang';
      include 'pages/barang/data_barang.php';
      break;

    case 'data_penjualan_single';
      include 'pages/barang/data_penjualan_single.php';
      break;

      case 'data_penjualan_multi';
      include 'pages/multibarang/data_penjualan_multi.php';
      break;

    case 'tambah_barang';
      include 'pages/barang/tambah_barang.php';
      break;

    case 'ubah_barang';
      include 'pages/barang/ubah_barang.php';
      break;

    case 'transaksi_barang';
      include 'pages/barang/transaksi_barang.php';
      break;

    case 'data_multibarang';
      include 'pages/multibarang/data_transaksi_barang_multi.php';
      break;

    case 'bayar';
      include 'pages/multibarang/bayar.php';
      break;

    case 'hapus_kantong';
      include 'pages/multibarang/hapus_kantong.php';
      break;

    case 'kantong_belanja';
      include 'pages/multibarang/kantong_belanja.php';
      break;
  }
} else {
  include "pages/beranda.php";
}
