<?php
$side = "Distribusi";
include_once "./Layouts/header.php";
include_once "./Layouts/sidebar.php";
require_once "../Controllers/c_distribusi.php";
require_once "../Controllers/c_databarang.php";
require_once "../Controllers/c_toko.php";

$distribusiController = new DistribusiController();
$barangController = new BarangController();
$tokoController = new TokoController();

$data_barang = $barangController->getDataBarang();
$data_toko = $tokoController->getDataToko();
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Distribusi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="v_distribusibarang.php">Distribusi</a></li>
        <li class="breadcrumb-item active">Tambah Distribusi</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <form action="../Controllers/c_distribusi.php?action=tambah" method="POST">

          <!-- Pilih Barang -->
          <div>
            <label class="form-label mt-4">Nama Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-select" required>
              <option disabled selected>Pilih Barang</option>
              <?php foreach ($data_barang as $barang) : ?>
                <option
                  value="<?= $barang['nama_barang']; ?>"
                  data-harga="<?= $barang['harga']; ?>">
                  <?= $barang['nama_barang']; ?> (Stok: <?= $barang['jumlah_barang']; ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Harga Otomatis -->
          <div>
            <label class="form-label">Harga / Satuan</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" name="harga" id="harga" class="form-control" readonly required>
            </div>
          </div>

          <!-- Jumlah Barang -->
          <div>
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah_distribusi" id="jumlah" class="form-control" required>
          </div>

          <!-- Subtotal Otomatis -->
          <div>
            <label class="form-label">Subtotal</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" name="subtotal" id="subtotal" class="form-control" readonly>
            </div>
          </div>

          <!-- Tujuan -->
          <div>
            <label class="form-label">Tujuan (Toko)</label>
            <select name="tujuan" class="form-select" required>
              <option disabled selected>Pilih Toko Tujuan</option>
              <?php foreach ($data_toko as $toko) : ?>
                <option value="<?= $toko['nama_toko']; ?>"><?= $toko['nama_toko']; ?> - <?= $toko['alamat']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Tanggal Kirim -->
          <div>
            <label class="form-label">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" required>
          </div>

          <br>
          <button type="submit" class="btn btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </section>
</main>

<!-- Script Otomatis Harga & Subtotal -->
<script>
  const barangSelect = document.getElementById('nama_barang');
  const hargaInput = document.getElementById('harga');
  const jumlahInput = document.getElementById('jumlah');
  const subtotalInput = document.getElementById('subtotal');

  function hitungSubtotal() {
    const harga = parseInt(hargaInput.value) || 0;
    const jumlah = parseInt(jumlahInput.value) || 0;
    subtotalInput.value = harga * jumlah;
  }

  barangSelect.addEventListener('change', function() {
    const selectedOption = barangSelect.options[barangSelect.selectedIndex];
    const harga = selectedOption.getAttribute('data-harga');
    hargaInput.value = harga;
    hitungSubtotal();
  });

  jumlahInput.addEventListener('input', hitungSubtotal);
</script>

<?php include_once "./Layouts/footer.php"; ?>