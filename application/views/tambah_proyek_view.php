<!DOCTYPE html>
<html>
<head>
    <title>Tambah Proyek</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tambahProyek.css'); ?>">
    <script>
        function updateEndDateMin() {
            var startDateInput = document.querySelector('input[name="tglMulai"]');
            var endDateInput = document.querySelector('input[name="tglSelesai"]');

            var startDate = startDateInput.value;
            if (startDate) {
                endDateInput.setAttribute('min', startDate);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var startDateInput = document.querySelector('input[name="tglMulai"]');
            startDateInput.addEventListener('change', updateEndDateMin);
        });
    </script>
</head>
<body>
    <nav id="navbar">
        <div id="navbar-brand">PT. SEI</div>
        <div id="navbar-links">
            <button id="navbar-button" onclick="window.location.href='<?php echo site_url('beranda/index'); ?>'">Beranda</button>
            <div class="dropdown">
                <button id="navbar-button" class="dropdown-button">Tambah Data</button>
                <div class="dropdown-content">
                    <a href="<?php echo site_url('beranda/show_add_lokasi_form'); ?>">Tambah Lokasi Baru</a>
                    <a href="<?php echo site_url('beranda/show_add_proyek_form'); ?>">Tambah Proyek Baru</a>
                </div>
            </div>
        </div>
    </nav>
    <h1>Tambah Proyek Baru</h1>
    <form method="post" action="<?php echo site_url('beranda/add_proyek'); ?>">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" name="namaProyek" required><br>

        <label for="client">Client:</label>
        <input type="text" name="client" required><br>

        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" name="tglMulai" required><br>

        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" name="tglSelesai" required><br>

        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" name="pimpinanProyek" required><br>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan"></textarea><br>

        <label for="lokasiId">Lokasi ID:</label>
        <select name="lokasiId" required>
            <?php foreach ($lokasi as $item) : ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['id'] . ' - ' . $item['namaLokasi']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <button id="tombol_submit" type="submit">Tambah</button>
        <button id="tombol_batal" type="button" onclick="window.location.href='<?php echo site_url('beranda'); ?>'">Batal</button>
    </form>
</body>
</html>
