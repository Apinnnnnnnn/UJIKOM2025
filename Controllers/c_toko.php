<?php
require_once '../Models/m_toko.php';

class TokoController
{
  // Fungsi untuk mengambil semua data toko
  public function getDataToko()
  {
    $toko = new Toko();
    $toko_barang = $toko->getAllToko();

    return $toko_barang;
  }
}
