<?php
require_once '../Models/m_suplayer.php';

class SuplayerController
{
  // Fungsi untuk mengambil semua data suplayer
  public function getDataSuplayer()
  {
    $suplayer = new Suplayer();
    $suplayer_barang = $suplayer->getAllSuplayer();

    return $suplayer_barang;
  }
}
