<?php
$side = "Distribusi";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";
require_once "../Controllers/c_distribusi.php";
require_once "../Controllers/c_toko.php";
$tokoController = new TokoController();
$data_toko = $tokoController->getDataToko();


$distribusiController = new DistribusiController();
$id_distribusi = $_GET['id_distribusi'] ?? null;
$distribusi = $id_distribusi ? $distribusiController->getDistribusiById($id_distribusi) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_barang = $_POST['nama_barang'];
  $harga = $_POST['harga'];
  $jumlah_distribusi = $_POST['jumlah_distribusi'];
  $subtotal = $_POST['subtotal'];
  $tujuan = $_POST['tujuan'];
  $tanggal_keluar = $_POST['tanggal_keluar'];

  $distribusiController->editDistribusi($id_distribusi, $nama_barang, $harga, $jumlah_distribusi, $subtotal, $tujuan, $tanggal_keluar);
  echo "<script>alert('Distribusi berhasil diubah!'); window.location='v_distribusibarang.php';</script>";
  exit();
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Distribusi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="v_distribusibarang.php">Distribusi</a></li>
        <li class="breadcrumb-item active">Edit Distribusi</li>
      </ol>
    </nav>

    <section class="section">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
            <div>
              <label class="form-label mt-4">Nama Barang</label>
              <input type="text" name="nama barang" value="<?php echo $distribusi['nama_barang'] ?? '' ?>" class="form-control">
            </div>
            <div>
              <label class="form-label">Harga</label>
              <input type="number" name="harga" value="<?php echo $distribusi['harga'] ?? '' ?>" class="form-control">
            </div>
            <div>
              <label class="form-label">Jumlah</label>
              <input type="number" name="jumlah_distribusi" value="<?php echo $distribusi['jumlah_distribusi'] ?? '' ?>" class="form-control">
            </div>
            <div>
              <label class="form-label">Subtotal</label>
              <input type="number" name="subtotal" value="<?php echo $distribusi['subtotal'] ?? '' ?>" class="form-control">
            </div>
            <label class="form-label">Tujuan</label>
            <select name="tujuan" class="form-select" required>
              <?php foreach ($data_toko as $toko): ?>
                <option value="<?= $toko['nama_toko']; ?>" <?= ($toko['nama_toko'] == $distribusi['tujuan']) ? 'selected' : '' ?>>
                  <?= $toko['nama_toko']; ?>
                </option>
              <?php endforeach; ?>
            </select>
            <div>
              <label class="form-label">Tanggal Keluar</label>
              <input type="date" name="tanggal_keluar" value="<?php echo $distribusi['tanggal_keluar'] ?? '' ?>" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </section>
  </div>
</main>


<?php
include_once "./Layouts/content.php";
?>