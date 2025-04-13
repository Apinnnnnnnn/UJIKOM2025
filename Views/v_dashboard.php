<?php
SESSION_START();
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php");
  exit();
}

$username = $_SESSION['username'];

$side = "Dashboard";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";

$conn = (new Koneksi())->getConnection();

$queryBarang = $conn->query("SELECT COUNT(*) AS total FROM tb_barang");
$jumlahBarang = $queryBarang->fetch_assoc()['total'];

$queryDistribusi = $conn->query("SELECT COUNT(*) AS total FROM tb_distribusi");
$jumlahDistribusi = $queryDistribusi->fetch_assoc()['total'];

$querySuplayer = $conn->query("SELECT COUNT(*) AS total FROM tb_suplayer");
$jumlahSuplayer = $querySuplayer->fetch_assoc()['total'];

$queryToko = $conn->query("SELECT COUNT(*) AS total FROM tb_toko");
$jumlahToko = $queryToko->fetch_assoc()['total'];

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card shadow-sm p-4">
      <div class="text-center mb-4 mt-2">
        <h2 class="text-capitalize">Selamat Datang,
          <span class="fw-bold font-monospace text-primary"><?= htmlspecialchars($username); ?></span>!
        </h2>
        <p class="text-muted mt-2 px-3">
          Selamat datang di sistem informasi gudang. Di sini, Anda dapat dengan mudah memantau stok barang, mencatat distribusi,
          dan memastikan semua proses berjalan tertib. Mari kelola gudang dengan lebih cerdas dan praktis.
        </p>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-3 mb-2">
          <div class="card bg-light shadow p-4 text-center rounded-3">
            <i class="bi bi-box-seam-fill fs-2 text-secondary mb-2"></i>
            <h5 class="card-title mb-1">Total Barang</h5>
            <p class="fs-4"><?= $jumlahBarang ?></p>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="card bg-light shadow p-4 text-center rounded-3">
            <i class="bi bi-truck-front-fill fs-2 text-success mb-2"></i>
            <h5 class="card-title mb-1">Total Distribusi</h5>
            <p class="fs-4"><?= $jumlahDistribusi ?></p>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="card bg-light shadow p-4 text-center rounded-3">
            <i class="bi bi-buildings-fill fs-2 text-info mb-2"></i>
            <h5 class="card-title mb-1">Total Suplayer</h5>
            <p class="fs-4"><?= $jumlahSuplayer ?></p>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="card bg-light shadow p-4 text-center rounded-3">
            <i class="bi bi-shop-window fs-2 text-warning mb-2"></i>
            <h5 class="card-title mb-1">Total Toko</h5>
            <p class="fs-4"><?= $jumlahToko ?></p>
          </div>
        </div>
      </div>
  </section>

</main><!-- End #main -->

<?php
include_once "./Layouts/footer.php";
?>