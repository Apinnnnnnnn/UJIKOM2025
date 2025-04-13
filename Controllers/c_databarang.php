<?php
require_once '../Models/m_databarang.php';

class BarangController
{
  // Fungsi untuk mendapatkan data barang berdasarkan ID
  public function getBarangById($id_barang)
  {
    $barang = new Barang();
    return $barang->getBarangById($id_barang);
  }

  // Fungsi untuk mengambil semua data barang
  public function getDataBarang()
  {
    $barang = new Barang();
    $data_barang = $barang->getAllBarang();

    return $data_barang;
  }

  // Fungsi untuk menambahkan data barang baru
  public function tambahBarang($nama_barang, $id_suplayer, $jumlah_barang, $harga, $kategori, $tanggal_masuk)
  {
    $barang = new Barang();
    try {
      $result = $barang->addBarang($nama_barang, $id_suplayer, $jumlah_barang, $harga, $kategori, $tanggal_masuk);
      if (!$result) {
        throw new Exception("Gagal menambahkan barang.");
      }
      return true;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }

  // Fungsi untuk mengupdate data barang
  public function editBarang($id_barang, $nama_barang, $id_suplayer, $jumlah_barang, $harga, $kategori, $tanggal_masuk)
  {
    $barang = new Barang();
    return $barang->editBarang($id_barang, $nama_barang, $id_suplayer, $jumlah_barang, $harga, $kategori, $tanggal_masuk);
  }

  // Fungsi untuk menghapus data barang
  public function hapusBarang($id_barang)
  {
    $barang = new Barang();
    return $barang->deleteBarang($id_barang);
  }
}
