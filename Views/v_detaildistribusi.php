<?php
$side = "DetailDistribusi";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";
require_once "../Controllers/c_detaildistribusi.php";

$detailController = new DetailController();
$data_detail = $detailController->getDetailDistribusi();
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Detail Distribusi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Detail Distribusi</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <table class="table mt-4">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">ID Distribusi</th>
                  <th class="text-center">Nama Barang</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">Subtotal</th>
                  <th class="text-center">Tujuan</th>
                  <th class="text-center">Tanggal Keluar</th>
                  <th class="text-center">Konfirmasi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_detail)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_detail as $distribusi): ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['id_distribusi']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['nama_barang']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['jumlah_distribusi']) ?></td>
                      <td class="text-center">Rp <?= number_format($distribusi['subtotal'], 0, ',', '.') ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['tujuan']) ?></td>
                      <td class="text-center"><?= htmlspecialchars($distribusi['tanggal_keluar']) ?></td>
                      <td class="text-center">
                        <?php if ($distribusi['konfirmasi'] === 'Konfirmasi'): ?>
                          <span class="badge bg-success">Konfirmasi</span>
                        <?php else: ?>
                          <span class="badge bg-secondary"><?= htmlspecialchars($distribusi['konfirmasi']) ?></span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="8" class="text-center">Tidak ada data Distribusi.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once "./Layouts/footer.php"; ?>