<!DOCTYPE html>
<html>
<head>
    <title>Edit Proyek</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/editProyek.css'); ?>">
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
    <h1>Edit Proyek</h1>
    <form action="<?php echo site_url('beranda/update_proyek'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($proyek['id']); ?>">

        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" name="namaProyek" value="<?php echo htmlspecialchars($proyek['namaProyek']); ?>" required><br>

        <label for="client">Client:</label>
        <input type="text" name="client" value="<?php echo htmlspecialchars($proyek['client']); ?>" required><br>

        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" name="tglMulai" value="<?php echo htmlspecialchars($proyek['tglMulai']); ?>" required><br>

        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" name="tglSelesai" value="<?php echo htmlspecialchars($proyek['tglSelesai']); ?>" required><br>

        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" name="pimpinanProyek" value="<?php echo htmlspecialchars($proyek['pimpinanProyek']); ?>" required><br>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" required><?php echo htmlspecialchars($proyek['keterangan']); ?></textarea><br>

        <button id="tombol_simpan" type="submit">Simpan</button>
        <button id="tombol_batal" type="button" onclick="window.location.href='<?php echo site_url('beranda'); ?>'">Batal</button>
    </form>
</body>
</html>
