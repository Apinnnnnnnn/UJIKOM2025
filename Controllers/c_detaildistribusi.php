<?php
require_once '../Models/m_detaildistribusi.php';

class DetailController
{
  // Fungsi untuk menampilkan semua data detail distribusi
  public function getDetailDistribusi()
  {
    $detail = new Detail();
    return $detail->getAllDetail();
  }

  // Fungsi untuk mengKonfirmasi distribusi barang
  public function konfirmasiDistribusi($id_distribusi, $nama_barang, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar, $konfirmasi)
  {
    $detail = new Detail();
    return $detail->konfirmasiDistribusi($id_distribusi, $nama_barang, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar, $konfirmasi);
  }
}
