<?php
$side = "Distribusi";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";
require_once "../Controllers/c_distribusi.php";

$distribusiController = new DistribusiController();
$data_distribusi = $distribusiController->getDataDistribusi();

?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Distribusi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="v_distribusibarang.php">Distribusi</a></li>
      </ol>
    </nav>
    <a href="../Views/v_tambahdistribusi.php" class="btn btn-success mb-3">Tambah Distribusi</a>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table mt-4">
              <thead>
                <tr>
                  <th class="text-center">NO</th>
                  <th class="text-center">Nama Barang</th>
                  <th class="text-center">Harga</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">Subtotal</th>
                  <th class="text-center">Tujuan</th>
                  <th class="text-center">Tanggal Keluar</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <?php $no = 1; ?>
              <tbody>
                <?php if (!empty($data_distribusi)): ?>
                  <?php foreach ($data_distribusi as $distribusi) : ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['nama_barang']) ?></td>
                      <td class="text-center">Rp <?= number_format($distribusi['harga'], 0, ',', '.') ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['jumlah_distribusi']) ?></td>
                      <td class="text-center">Rp <?= number_format($distribusi['subtotal'], 0, ',', '.') ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['tujuan']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['tanggal_keluar']) ?></td>
                      <td class="text-center">
                        <?php
                        $sudahDikonfirmasi = $distribusiController->isDistribusiTerkonfirmasi($distribusi['id_distribusi']);
                        if (!$sudahDikonfirmasi):
                        ?>
                          <a href="v_konfirmasidistribusi.php?id_distribusi=<?= urlencode($distribusi['id_distribusi']) ?>" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Konfirmasi</a> ♾️
                          <a href="v_hapusdistribusi.php?id_distribusi=<?= urlencode($distribusi['id_distribusi']) ?>" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Apakah Anda yakin ingin mengembalikan distribusi ini?')">Kembalikan</a>
                        <?php else: ?>
                          <span class="badge bg-success">Sudah Dikonfirmasi</span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="10" class="text-center">Tidak ada data Distribusi.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php
include_once "./Layouts/footer.php";
?>