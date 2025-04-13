<?php
require_once '../Config/Koneksi.php';

class Detail
{
  private $db;

  public function __construct()
  {
    $this->db = new Koneksi();
  }

  public function getAllDetail()
  {
    $query = "SELECT * FROM tb_detail_distribusi";
    $result = $this->db->conn->query($query);

    if (!$result) {
      die('Query Error: ' . $this->db->conn->error);
    }
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function konfirmasiDistribusi($id_distribusi, $nama_barang, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar, $konfirmasi)
  {
    $query = "INSERT INTO tb_detail_distribusi (id_distribusi, nama_barang, jumlah_distribusi, subtotal, tujuan, tanggal_keluar, konfirmasi) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->conn->prepare($query);
    $stmt->bind_param("isidsss", $id_distribusi, $nama_barang, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar, $konfirmasi);
    return $stmt->execute();
  }
}
