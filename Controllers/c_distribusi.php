<?php
require_once '../Models/m_distribusi.php';

if (isset($_GET['action']) && $_GET['action'] == 'tambah') {
  $distribusiController = new DistribusiController();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menambahkan distribusi barang dengan data yang diinput lewat form
    $distribusiController->tambahDistribusi(
      $_POST['nama_barang'],
      $_POST['harga'],
      $_POST['jumlah_distribusi'],
      $_POST['subtotal'],
      $_POST['tujuan'],
      $_POST['tanggal_keluar']
    );
  }
}

class DistribusiController
{
  // Fungsi untuk mengambil data distribusi berdasarkan ID
  public function getDistribusiById($id_distribusi)
  {
    $distribusi = new Distribusi();
    return $distribusi->getDistribusiById($id_distribusi);
  }

  // Fungsi untuk mengambil semua data distribusi
  public function getDataDistribusi()
  {
    $distribusi = new Distribusi();
    return $distribusi->getAllDistribusi();
  }

  // Fungsi untuk menambahkan data distribusi
  public function tambahDistribusi($nama_barang, $harga, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar)
  {
    $distribusi = new Distribusi();
    $stok_tersedia = $distribusi->getStokBarang($nama_barang);

    if ($jumlah_distribusi > $stok_tersedia) {
      echo "<script>alert('Gagal! Jumlah distribusi melebihi stok yang tersedia.'); window.history.back();</script>";
      exit();
    }

    if ($distribusi->addDistribusi($nama_barang, $harga, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar)) {
      echo "<script>alert('Distribusi berhasil ditambahkan!'); window.location='../Views/v_distribusibarang.php';</script>";
    } else {
      echo "<script>alert('Gagal menambahkan distribusi!'); window.history.back();</script>";
    }
    exit();
  }

  // Fungsi untuk mengedit data distribusi
  public function editDistribusi($id_distribusi, $nama_barang, $harga, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar)
  {
    $distribusi = new Distribusi();
    return $distribusi->editDistribusi($id_distribusi, $nama_barang, $harga, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar);
  }

  // Fungsi untuk menghapus data distribusi
  public function hapusDistribusi($id_distribusi)
  {
    $distribusi = new Distribusi();
    return $distribusi->deleteDistribusi($id_distribusi);
  }

  // Fungsi untuk memeriksa apakah distribusi sudah terkonfirmasi
  public function isDistribusiTerkonfirmasi($id_distribusi)
  {
    $distribusi = new Distribusi();
    return $distribusi->cekKonfirmasiDistribusi($id_distribusi);
  }
}
