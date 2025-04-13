<?php
$side = "Distribusi";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";
require_once "../Controllers/c_distribusi.php";
require_once "../Controllers/c_toko.php";
require_once "../Controllers/c_detaildistribusi.php";

$tokoController = new TokoController();
$data_toko = $tokoController->getDataToko();

$distribusiController = new DistribusiController();
$id_distribusi = $_GET['id_distribusi'] ?? null;
$distribusi = $id_distribusi ? $distribusiController->getDistribusiById($id_distribusi) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_barang = $_POST['nama_barang'];
  $jumlah_distribusi = $_POST['jumlah_distribusi'];
  $subtotal = $_POST['subtotal'];
  $tujuan = $_POST['tujuan'];
  $tanggal_keluar = $_POST['tanggal_keluar'];
  $konfirmasi = $_POST['konfirmasi'];

  $konfirmasiController = new DetailController();
  $konfirmasiController->konfirmasiDistribusi($id_distribusi, $nama_barang, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar, $konfirmasi);

  echo "<script>alert('Distribusi berhasil dikonfirmasi!'); window.location='v_detaildistribusi.php';</script>";
  exit();
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Konfirmasi Distribusi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="v_distribusibarang.php">Distribusi</a></li>
        <li class="breadcrumb-item active">Konfirmasi</li>
      </ol>
    </nav>

    <section class="section">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
            <label class="form-label mt-4">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $distribusi['nama_barang'] ?? '' ?>" readonly>

            <label class="form-label mt-3">Jumlah Distribusi</label>
            <input type="number" name="jumlah_distribusi" class="form-control" value="<?= $distribusi['jumlah_distribusi'] ?? '' ?>" readonly>

            <div>
              <label class="form-label mt-3">Subtotal</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="subtotal" class="form-control" value="<?= $distribusi['subtotal'] ?? '' ?>" readonly>
              </div>
            </div>

            <label class="form-label mt-3">Tujuan</label>
            <select name="tujuan" class="form-select" readonly>
              <?php foreach ($data_toko as $toko): ?>
                <option value="<?= $toko['nama_toko']; ?>" <?= ($toko['nama_toko'] == ($distribusi['tujuan'] ?? '')) ? 'selected' : '' ?>>
                  <?= $toko['nama_toko']; ?>
                </option>
              <?php endforeach; ?>
            </select>

            <label class="form-label mt-3">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" value="<?= $distribusi['tanggal_keluar'] ?? '' ?>" readonly>

            <label class="form-label mt-3">Status</label>
            <select name="konfirmasi" class="form-select" required>
              <option value="">Pilih Status</option>
              <option value="Konfirmasi" <?= ($distribusi['konfirmasi'] ?? '') == 'Konfirmasi' ? 'selected' : '' ?>>Konfirmasi</option>
            </select>

            <br>
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </form>
        </div>
      </div>
    </section>
  </div>
</main>

<?php include_once "./Layouts/content.php"; ?>